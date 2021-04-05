<template>
  <div class="chat-box">
    <div class="header">
      <div class="room d-flex" v-if="room">
        <div class="name-room mr-2">
          <div
            style="font-weight: bold"
            :class="$vssWidth < 1125 ? 'mobile' : 'desktop'"
          >
            {{ room.name }}
          </div>
          <div class="d-flex">
            <div
              class="mb-0"
              :class="[
                role[0] == 'user'
                  ? room.narasumber_name == null
                    ? ''
                    : 'font-weight-bold'
                  : room.user_name == null
                  ? ''
                  : 'font-weight-bold',
                $vssWidth < 1125 ? 'mobile' : 'desktop',
              ]"
            >
              {{
                role[0] == "user"
                  ? room.narasumber_name == null
                    ? "no narasumber"
                    : room.narasumber_name
                  : room.user_name == null
                  ? "no user"
                  : room.user_name
              }}
            </div>
            <div
              class="mb-0 ml-3"
              :class="[
                room.narasumber_name == null ? '' : 'font-weight-bold',
                $vssWidth < 1125 ? 'mobile' : 'desktop',
              ]"
              v-if="role[0] == 'super admin'"
            >
              {{
                room.narasumber_name == null
                  ? "no narasumber"
                  : room.narasumber_name
              }}
            </div>
          </div>
        </div>
        <h4
          class="ticket"
          :class="$vssWidth < 1125 ? 'mobile' : 'desktop'"
          v-if="room.ticket"
        >
          Sisa waktu {{ minute | two_digits }}:{{ second | two_digits }}
        </h4>
        <button
          @click="exit"
          class="btn btn-room mr-0"
          :class="ticket ? 'ml-2' : 'ml-auto'"
          v-if="role[0] != 'super admin'"
        >
          {{
            role[0] == "user"
              ? "Close Room"
              : isChatting
              ? "End chat"
              : "Close Room"
          }}
        </button>
      </div>
      <div v-else class="no-room">
        <h1>Select a room</h1>
      </div>
    </div>
    <MessageList
      :room="room"
      :messages="messages"
      :role="role"
      :ticket="ticket"
      @imgUrl="showImg"
    ></MessageList>
    <MessageInput
      v-if="role[0] != 'super admin' && room != null"
      :role="role"
      :room="room"
      :uploadedFile="uploadedFile"
      @createTicket="$emit('createTicket', room)"
      @send="sendMessage"
      @show="showModal"
    ></MessageInput>
    <upload-file @file="setFile" :uploadedFile="uploadedFile"></upload-file>
    <ImagePreview :imgUrl="imgUrl"></ImagePreview>
  </div>
</template>
<script>
import MessageInput from "./MessageInput";
import MessageList from "./MessageList";
import UploadFile from "./UploadFile.vue";
import ImagePreview from "./ImagePreview";
export default {
  props: {
    room: { type: Object, default: null },
    messages: { type: Array, default: [] },
    role: { type: Array, default: [] },
    ticket: { type: Object, default: null },
  },
  data() {
    return {
      isModalVisible: false,
      uploadedFile: null,
      second: 0,
      minute: 0,
      exp: null,
      isChatting: false,
      time: null,
      imgUrl: null,
    };
  },
  mounted() {
    if (this.ticket) {
      this.nowTime();
    }
  },
  methods: {
    showImg(imgUrl) {
      this.imgUrl = imgUrl;
      this.$modal.show("image-preview");
    },
    nowTime() {
      if (this.ticket && this.time == null) {
        var _tcktdate = new Date(this.ticket.expired_at);
        var _date;
        this.time = setInterval(() => {
          if (new Date(_date).getSeconds() !== new Date().getSeconds()) {
            _date = new Date();
            if (_date < _tcktdate) {
              this.exp = new Date(_tcktdate.getTime() - _date.getTime());
              this.second = this.exp.getSeconds();
              this.minute = this.exp.getMinutes();
            } else {
              this.stopTime();
              this.$emit("timeup");
            }
          }
        }, 100);
      }
    },
    stopTime() {
      clearInterval(this.time);
      this.time = null;
    },
    showModal() {
      this.$modal.show("upload-file");
    },
    exit() {
      axios
        .post("/chat/exitroom", { room: this.room, role: this.role })
        .then(() => {
          this.stopTime();
          this.$emit("exit");
        });
    },
    setFile(file) {
      if (!this.room) {
        return;
      }
      this.uploadedFile = file;
      var _role = false;
      var _fileName = null;
      var _fileType = "file";
      var _filePath = null;
      if (this.role[0] == "narasumber") {
        _role = true;
      }
      if (this.uploadedFile) {
        _fileName = this.uploadedFile.name;
        _fileType = this.uploadedFile.type;
        _filePath = this.uploadedFile.path;
      }
      // console.log();
      axios
        .post("/chat/conversation/send", {
          isNarasumber: _role,
          room_id: this.room.id,
          text: null,
          ticket: this.room.ticket,
          filename: _fileName,
          filetype: _fileType,
          filepath: _filePath,
        })
        .then((response) => {
          this.uploadedFile = null;
          this.$modal.hide("upload-file");
          // this.$emit("new", response.data);
        });
    },
    sendMessage(text) {
      var _role = false;
      var _fileName = null;
      var _fileType = "text";
      var _filePath = null;
      if (!this.room) {
        return;
      }
      if (this.role[0] == "narasumber") {
        _role = true;
      }
      // if (this.uploadedFile) {
      //   _fileName = this.uploadedFile.name;
      //   _fileType = this.uploadedFile.type;
      //   _filePath = this.uploadedFile.path;
      // }
      // console.log();
      axios
        .post("/chat/conversation/send", {
          isNarasumber: _role,
          room_id: this.room.id,
          text: text,
          ticket: this.room.ticket,
          filename: _fileName,
          filetype: _fileType,
          filepath: _filePath,
        })
        .then((response) => {
          // this.uploadedFile = null;
          // this.$emit("new", response.data);
        });
    },
  },
  watch: {
    room(room) {
      this.room = room;
      this.isChatting = false;
      if (this.room && this.room.user_id) {
        this.isChatting = true;
      }
    },
    ticket(ticket) {
      this.nowTime();
    },
    minute(minute) {
      if (minute > 5 && minute < 10) {
        var notifprops = {
          group: "timer",
          type: "warn",
          title: "Sesi Chat",
          duration: 10000,
          text: "<p>Sisa waktu sesi konsultasi anda kurang dari 10 menit</p>",
        };
        this.$emit("notif", notifprops);
      } else if (this.minute > 1 && this.minute < 5) {
        var notifprops = {
          group: "timer",
          type: "warn",
          title: "Sesi Chat",
          duration: 10000,
          speed: 1000,
          text: "<p>Sisa waktu sesi konsultasi anda kurang dari 5 menit</p>",
        };
        this.$emit("notif", notifprops);
      } else if (minute < 1) {
        var notifprops = {
          group: "timer",
          type: "warn",
          title: "Sesi Chat",
          duration: 10000,
          speed: 1000,
          text: "<p>Sisa waktu sesi konsultasi anda kurang dari 1 menit</p>",
        };
        this.$emit("notif", notifprops);
      }
    },
    second(second) {
      if (this.minute == 0 && second == 0) {
        var notifprops = {
          group: "timer",
          type: "error",
          title: "Sesi Chat",
          duration: 10000,
          speed: 1000,
          text: "<p>Waktu habis!</p>",
        };
        this.$emit("notif", notifprops);
      }
    },
  },
  components: {
    MessageInput,
    MessageList,
    UploadFile,
    ImagePreview,
  },
};
</script>
<style lang="scss" scoped>
.mobile {
  font-size: 0.8rem;
}
.desktop {
  font-size: 1.2rem;
}
.chat-box {
  flex: 5;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  .header {
    padding: 8px;
    margin: 0;
    .room,
    .no-room {
      height: 100px;
      font-size: 2px !important;
      color: black;
      padding: 16px 24px;
      border-radius: 10px;
      text-transform: capitalize;
      box-shadow: 0px 3px 15px 5px rgb(128 128 128 / 30%);
      background-color: white;
      .ticket {
        margin: auto;
      }
      .btn-room {
        background-color: transparent;
        color: #6e376e;
        border-color: #6e376e;
        &:hover {
          background-color: #6e376e;
          color: white;
        }
      }
    }
  }
}
</style>