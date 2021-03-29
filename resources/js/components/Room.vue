<template>
  <div>
    <notifications position="bottom right" group="timer" />
    <notifications position="top right" group="user" />
    <div class="p-0">
      <div class="chat-app" v-if="role[0] != 'user' || selectedRoom != null">
        <RoomList
          v-if="showRoom && role[0] != 'user'"
          :rooms="rooms"
          :roomselect="selectedRoom"
          :role="role"
          @selected="startChat"
          @back="back"
          id="room"
        ></RoomList>
        <ChatBox
          v-if="showChatBox"
          :room="selectedRoom"
          :messages="messages"
          :role="role"
          :ticket="ticket"
          @createTicket="createTicket"
          @exit="exitRoom"
          @timeup="timeup"
          @notif="showNotifications"
          id="chatbox"
        ></ChatBox>
      </div>
      <RoomAll
        v-else
        :role="role"
        :rooms="rooms"
        @back="back"
        @chat="startChat"
      ></RoomAll>
    </div>
  </div>
</template>
<script>
import RoomList from "./RoomList";
import RoomAll from "./RoomAll";
import ChatBox from "./ChatBox";
export default {
  components: {
    RoomList,
    RoomAll,
    ChatBox,
  },
  props: {
    user: { type: Object, require: true },
    role: { type: Array, require: true },
    bidang: { require: true },
  },
  data() {
    return {
      selectedRoom: null,
      showRoom: false,
      showChatBox: true,
      messages: [],
      rooms: [],
      bidang_code: null,
      ticket: null,
      audio: null,
      audioSrc: "/sound/notification.mp3",
    };
  },
  mounted() {
    if (this.role[0] != "user") {
      if (this.$vssWidth < 1125 || this.$vssHeight < 625) {
        this.showRoom = true;
        this.showChatBox = false;
      } else {
        this.showRoom = true;
        this.showChatBox = true;
      }
    }
    this.audio = new Audio(this.audioSrc);
    this.bidang_code = this.bidang;
    if (this.role[0] == "user") {
      this.selectedRoom = JSON.parse(localStorage.getItem("room"));
      if (this.selectedRoom != null) {
        // console.log("user");
        this.echoRoom(this.selectedRoom.id);
        this.getMessage(this.selectedRoom);
        this.subsRoom(this.selectedRoom);
        this.getTicket(this.selectedRoom.ticket);
      }
    }
    // console.log("room");
    Echo.private("room-info").listen("JoinRoomEvent", (e) => {
      console.log("echo");
      if (this.role[0] == "user" && e.room.user_id == null) {
        this.exitRoom();
      }
      if (this.role[0] == "user" && e.room.user_id != null) {
        localStorage.setItem("room", JSON.stringify(e.room));
      }
      if (this.role[0] == "narasumber" && e.room.user_id) {
        var pronot = {
          group: "user",
          type: "success",
          title: "Sesi Chat",
          duration: 5000,
          speed: 1000,
          text: `<p>${e.room.user_name} has joined room ${e.room.name}</p>`,
        };
        this.showNotifications(pronot);
      }
      var $this = this;
      this.rooms.find(function (value, index) {
        if (value.id === e.room.id) {
          $this.rooms.splice(index, 1, e.room);
        }
        if ($this.selectedRoom) {
          if ($this.selectedRoom.id == e.room.id) {
            $this.selectedRoom = e.room;
          }
        }
      });
    });

    this.getRooms();
  },
  methods: {
    back() {
      this.$emit("back");
    },
    startChat(room) {
      this.selectedRoom = room;
      if (this.role[0] == "user") {
        this.showChatBox = true;
        localStorage.setItem("room", JSON.stringify(room));
      } else {
        if (this.$vssWidth < 1125 || this.$vssHeight < 625) {
          this.showRoom = false;
          this.showChatBox = true;
        }
      }
      this.echoRoom(room.id);
      this.subsRoom(room);
      this.getMessage(room);
    },
    timeup() {
      axios.post("/chat/exitroom", { room: this.selectedRoom, role: "user" });
      this.selectedRoom.ticket = null;
      this.ticket = null;
      this.getRooms();

      if (this.role[0] == "user") this.exitRoom();
    },
    getTicket(ticket_name) {
      if (ticket_name != null) {
        axios.get(`/chat/getticket/${ticket_name}`).then((res) => {
          this.setTicketExp(res.data.ticket);
        });
      }
    },
    setTicketExp(tckt) {
      this.ticket = tckt;
      this.ticket.expSec = new Date(this.ticket.expired_at).getSeconds();
      this.ticket.expMin = new Date(this.ticket.expired_at).getMinutes();
      this.ticket.expHou = new Date(this.ticket.expired_at).getHours();
    },
    createTicket(room) {
      // console.log("cp", room);
      axios
        .post("/chat/ticket", {
          id: room.id,
          user_id: room.user_id,
          narasumber_id: room.narasumber_id,
        })
        .then((res) => {
          this.setTicketExp(res.data.ticket);
        });
    },
    exitRoom() {
      if (this.selectedRoom) Echo.leave(`room.${this.selectedRoom.id}`);
      if (this.role[0] == "user" && this.selectedRoom) {
        axios.get(`/chat/saldo/${this.selectedRoom.user_id}`).then((res) => {
          if (res.data.saldo == 0) {
            window.location.href = "/user/membership";
          }
        });
        localStorage.removeItem("room");
      }
      this.selectedRoom = null;
      if (this.$vssWidth < 1125 || this.$vssHeight < 625) {
        this.showRoom = true;
        this.showChatBox = false;
      }
    },
    getRooms() {
      if (this.role[0] != "super admin") {
        axios.get("/chat/rooms/" + this.bidang_code).then((response) => {
          this.rooms = response.data;
        });
      } else {
        axios.get("/chat/rooms").then((response) => {
          this.rooms = response.data;
        });
      }
    },
    handleNewMessage(message) {
      if (this.selectedRoom && message.to == this.selectedRoom.id) {
        this.saveNewMessage(message);
        this.updateUnreadNumber(message.from_contact, true);
      } else {
        this.updateUnreadNumber(message.from_contact, false);
      }
    },
    saveNewMessage(message) {
      this.messages.push(message);
    },
    updateUnreadNumber(contact, reset) {
      this.rooms = this.rooms.map((single) => {
        if (single.id !== contact.id) {
          return single;
        }
        if (reset) {
          single.unread = 0;
        } else {
          single.unread += 1;
        }
        return single;
      });
    },
    subsRoom(room) {
      axios
        .post("/chat/joinroom", {
          room: room,
          user: this.user,
          role: this.role,
        })
        .then(() => {
          this.getRooms();
        });
    },
    echoRoom(id) {
      // console.log("echo user");
      Echo.private(`room.${id}`).listen("RoomEvent", (e) => {
        // console.log("new msg", e.message);
        if (this.role[0] == "narasumber") {
          if (!e.message.is_narasumber) {
            this.audio.play();
          }
        } else if (this.role[0] == "user") {
          if (e.message.is_narasumber) {
            this.audio.play();
          }
        }
        this.handleNewMessage(e.message);
      });
    },
    getMessage(room) {
      axios
        .post("/chat/conversation", { id: room.id, ticket: room.ticket })
        .then((response) => {
          this.messages = response.data;
        });
    },
    showNotifications(properties) {
      this.$notify({
        group: properties.group,
        type: properties.type,
        title: properties.title,
        duration: properties.duration,
        speed: 1000,
        text: properties.text,
      });
    },
  },
  watch: {
    bidang_code(bidang_code) {
      if (this.role != "super admin")
        axios.get("/chat/rooms/" + bidang_code).then((response) => {
          this.rooms = response.data;
        });
    },
    rooms(rooms) {
      this.rooms = rooms;
    },
    selectedRoom(selectedRoom) {
      this.selectedRoom = selectedRoom;
      if (selectedRoom) {
        if (selectedRoom.ticket) {
          this.getMessage(selectedRoom);
        }
        this.getTicket(this.selectedRoom.ticket);
      } else {
        if (this.$vssWidth < 1125 || this.$vssHeight < 625) {
          this.showRoom = true;
          this.showChatBox = false;
        }
      }
    },
  },
};
</script>
<style lang="scss" scoped>
.chat-app {
  display: flex;
  height: 85vh;
}
.fade-enter-active,
.fade-leave-active {
  transition: all 0.5s;
}
.fade-enter,
.fade-leave-to {
  opacity: 0;
  // transform: translateX(-50px);
}

::-webkit-scrollbar {
  width: 4px;
}

/* Track */
::-webkit-scrollbar-track {
  background: transparent;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #888;
  border-radius: 0;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555;
}
</style>