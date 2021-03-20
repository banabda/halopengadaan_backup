<template>
  <div v-if="room.ticket != null" class="message-input d-flex">
    <textarea
      autofocus
      :class="role[0] == 'user' ? 'user' : ''"
      v-model="message"
      @keydown.enter.exact.prevent="send"
      placeholder="Type a message"
    ></textarea>
    <a><i class="bi bi-paperclip" @click="showModal"></i></a>
    <emoji-picker @emoji="insert" :search="search" class="my-auto">
      <div
        class="emoji-invoker"
        slot="emoji-invoker"
        slot-scope="{ events: { click: clickEvent } }"
        @click.stop="clickEvent"
      >
        <i class="bi bi-emoji-smile"></i>
      </div>
      <div slot="emoji-picker" slot-scope="{ emojis, insert }">
        <div
          class="emoji-picker"
          :style="{ bottom: 90 + 'px', right: 20 + 'px' }"
        >
          <div class="emoji-picker__search">
            <input type="text" v-model="search" v-focus />
          </div>
          <div>
            <div v-for="(emojiGroup, category) in emojis" :key="category">
              <h5>{{ category }}</h5>
              <div class="emojis">
                <span
                  v-for="(emoji, emojiName) in emojiGroup"
                  :key="emojiName"
                  @click="insert(emoji)"
                  :title="emojiName"
                  >{{ emoji }}</span
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </emoji-picker>
    <!-- <a><i class="bi bi-emoji-smile"></i></a> -->
  </div>
  <button
    v-else-if="role[0] == 'narasumber' && room.user_id != null"
    class="btn btn-success"
    @click="$emit('createTicket')"
  >
    Start Chat
  </button>
</template>

<script>
import EmojiPicker from "vue-emoji-picker";
export default {
  components: {
    EmojiPicker,
  },
  directives: {
    focus: {
      inserted(el) {
        el.focus();
      },
    },
  },
  props: {
    role: {
      type: Array,
      require: true,
    },
    room: {
      type: Object,
      require: true,
    },
  },
  data() {
    return {
      message: "",
      input: "",
      search: "",
    };
  },
  methods: {
    showModal() {
      this.$emit("show");
    },
    insert(emoji) {
      this.message += emoji;
    },
    send() {
      if (this.message == "") {
        return;
      }
      this.$emit("send", this.message);
      this.message = "";
    },
  },
};
</script>
<style lang="scss" scoped>
.message-input {
  a,
  .bi {
    align-self: center;
    font-size: 30px;
    margin: 0 6px;
  }
  textarea {
    width: 85%;
    margin: 10px;
    margin-right: 0;
    resize: none;
    border-radius: 6px;
    border: 1px solid lightgray;
    padding: 10px;
    overflow-y: scroll;
    &.user {
      width: 89%;
    }
  }
}
.message-input {
  position: relative;
  display: inline-block;
}
.emoji-invoker {
  position: relative;
  width: fit-content;
  height: fit-content;
  border-radius: 50%;
  cursor: pointer;
  transition: all 0.2s;
}
.emoji-invoker:hover {
  transform: scale(1.1);
}
.emoji-invoker > svg {
  fill: #b1c6d0;
}

.emoji-picker {
  position: absolute;
  z-index: 1;
  // font-family: Montserrat;
  border: 1px solid #ccc;
  width: 25rem;
  height: 25rem;
  overflow: scroll;
  padding: 1rem;
  box-sizing: border-box;
  border-radius: 0.5rem;
  background: #fff;
  box-shadow: 1px 1px 8px #c7dbe6;
}
.emoji-picker__search {
  display: flex;
}
.emoji-picker__search > input {
  flex: 1;
  border-radius: 10rem;
  border: 1px solid #ccc;
  padding: 0.5rem 1rem;
  outline: none;
}
.emoji-picker h5 {
  margin: 10px 0;
  color: #b1b1b1;
  text-transform: uppercase;
  font-size: 1rem;
  cursor: default;
}
.emoji-picker .emojis {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}
.emoji-picker .emojis:after {
  content: "";
  flex: auto;
}
.emoji-picker .emojis span {
  padding: 0.2rem;
  font-size: 1.5em;
  cursor: pointer;
  border-radius: 5px;
}
.emoji-picker .emojis span:hover {
  background: #ececec;
  cursor: pointer;
}

::-webkit-scrollbar {
  width: 5px;
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