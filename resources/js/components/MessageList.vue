<template>
  <div class="message-list" ref="messages">
    <div class="chat-board">
      <transition-group name="list-complete" tag="ul" v-if="room && ticket">
        <li
          v-for="message in messages"
          class="list-complete-item"
          :class="`message ${
            isNarasumber
              ? message.is_narasumber
                ? 'received'
                : 'sent'
              : message.is_narasumber
              ? 'sent'
              : 'received'
          }`"
          :key="message.id"
        >
          <div class="chat">
            <img
              class="mx-auto mb-4"
              width="250px"
              v-if="message.type.includes('image')"
              :src="message.path"
              :alt="message.file_name"
              @click="showImg(message.path)"
            />
            <button
              class="btn btn-file mb-4"
              v-else-if="message.file_name != null"
            >
              {{ message.file_name }}
            </button>
            <div class="text" v-html="message.text"></div>
            <span class="message-time">{{
              new Date(message.created_at).toLocaleTimeString("id", {
                hour: "2-digit",
                minute: "2-digit",
              })
            }}</span>
          </div>
        </li>
      </transition-group>
      <div v-else-if="role[0] == 'user'" class="waiting">
        <p v-if="!room.narasumber_id">Menunggu Narasumber</p>
        <p v-else>Menunggu Narasumber Memulai Percakapan</p>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    room: {
      type: Object,
    },
    messages: {
      type: Array,
      require: true,
    },
    role: {
      type: Array,
      require: true,
    },
    ticket: {
      type: Object,
      require: true,
    },
  },
  data() {
    return {
      isNarasumber: true,
    };
  },
  mounted() {
    if (this.role[0] != "user") {
      this.isNarasumber = false;
    }
  },
  methods: {
    showImg(url) {
      console.log("test");
      this.$emit("imgUrl", url);
    },
    scrollToBottom() {
      setTimeout(() => {
        this.$refs.messages.scrollTop =
          this.$refs.messages.scrollHeight - this.$refs.messages.clientHeight;
      }, 50);
    },
  },
  watch: {
    room(room) {
      this.scrollToBottom();
    },
    ticket(ticket) {
      this.ticket = ticket;
    },
    messages(messages) {
      this.scrollToBottom();
    },
  },
};
</script>
<style lang="scss" scoped>
.list-complete-item {
  transition: all 0.3s;
  // display: inline-block;
  // margin-right: 10px;
}
.list-complete-enter, .list-complete-leave-to
/* .list-complete-leave-active below version 2.1.8 */ {
  opacity: 0;
  transform: translateY(30px);
}
.list-complete-leave-active {
  position: absolute;
}
.chat-board {
  height: inherit;
}
.message-list {
  background-color: white;
  box-shadow: 0px 3px 15px 5px rgb(128 128 128 / 30%);
  border-radius: 10px;
  margin: 8px 8px 0 8px;
  padding: 0 0 0 8px;
  height: 100%;
  // max-height: 550px;
  overflow-y: scroll;
  .waiting {
    height: inherit;
    display: flex;
    justify-content: center;
    align-items: center;
    font-weight: bold;
    font-size: 1.5rem;
    p {
      text-align: center;
    }
  }
  ul {
    list-style-type: none;
    padding: 5px;
    li {
      &.message {
        margin: 10px 0;
        width: 100%;
        .chat {
          max-width: 75%;
          flex-direction: column;
          position: relative;
          border-radius: 8px;
          padding: 12px;
          display: inline-block;
          .btn-file {
            color: white;
            background: linear-gradient(to left, #ca4b7c, #6e376e);
          }
          img {
            display: block;
            cursor: pointer;
          }
          .message-time {
            display: flex;
            justify-content: flex-end;
            font-size: 0.8rem;
            font-weight: 200;
          }
          .text {
            max-width: fit-content(20em);
            word-wrap: break-word;
            margin-bottom: 5px;
            font-size: 1.1rem;
            white-space: pre-line;
          }
        }

        &.received {
          text-align: left;
          .chat {
            background: #fe7087;
          }
        }

        &.sent {
          text-align: right;
          .chat {
            background: #fe9d82;
            text-align: left;
          }
        }
      }
    }
  }
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