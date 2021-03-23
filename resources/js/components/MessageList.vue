<template>
  <div class="message-list" ref="messages">
    <ul v-if="room && ticket">
      <li
        v-for="message in messages"
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
            class="btn btn-info mb-4"
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
    </ul>
    <div v-else-if="role[0] == 'user'" class="waiting">
      <p v-if="!room.narasumber_id">Menunggu Narasumber</p>
      <p v-else>Menunggu Narasumber Memulai Percakapan</p>
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
.message-list {
  background-color: rgb(236, 245, 253);
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
          max-width: 500px;
          flex-direction: column;
          position: relative;
          border-radius: 8px;
          padding: 12px;
          display: inline-block;
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
            background-color: mediumspringgreen;
          }
        }

        &.sent {
          text-align: right;
          .chat {
            background-color: mediumturquoise;
            text-align: left;
          }
        }
      }
    }
  }
}
::-webkit-scrollbar {
  width: 8px;
}

/* Track */
::-webkit-scrollbar-track {
  background: transparent;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #888;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555;
}
</style>