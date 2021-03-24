<template>
  <div class="contacts-list">
    <ul>
      <li
        v-for="room in rooms"
        :key="room.id"
        @click="selectedRoom(room)"
        :class="
          roomselect ? (roomselect.id == room.id ? 'roomselected' : '') : ''
        "
      >
        <div class="room p-2 text-center">
          <!-- <img :src="room.profile_image" :alt="room.name" /> -->
          <p class="room-name">
            {{ room.name }}
          </p>
        </div>
        <div class="contact">
          <p
            class="name"
            :class="room.narasumber_name ? 'font-weight-bold' : ''"
          >
            {{
              room.narasumber_name == null
                ? "no narasumber"
                : room.narasumber_name
            }}
          </p>
          <p class="email" :class="room.user_name ? 'font-weight-bold' : ''">
            {{ room.user_name == null ? "no user" : room.user_name }}
          </p>
        </div>
        <!-- <span class="unread" v-if="room.unread">{{ room.unread }}</span> -->
      </li>
    </ul>
  </div>
</template>
<script>
export default {
  props: {
    rooms: {
      type: Array,
      default: [],
    },
    roomselect: { type: Object, default: null },
  },
  watch: {
    rooms(rooms) {
      this.rooms = rooms;
    },
  },
  data() {
    return {
      isShow: true,
    };
  },
  mounted() {
    console.log(this.$vssWidth, this.$vssHeight);
  },
  methods: {
    selectedRoom(rm) {
      this.$emit("selected", rm);
    },
  },
  watch: {
    $vssWidth($vssWidth) {
      console.log("Width", $vssWidth);
    },
    $vssHeight($vssHeight) {
      console.log("Height", $vssHeight);
    },
  },
};
</script>
<style lang="scss" scoped>
.contacts-list {
  max-height: 85vh;
  background-color: white;
  overflow-y: auto;
  transition: flex 0.2s ease-in-out;
  flex: 2;
  ul {
    list-style-type: none;
    padding-left: 0;
    li {
      display: flex;
      padding: 2px;
      border-bottom: 1px solid rgba(109, 108, 108, 0.219);
      height: 80px;
      position: relative;
      cursor: pointer;
      &.roomselected {
        background: linear-gradient(to left, #ca4b7c, #6e376e);
        color: white;
      }
    }

    .unread {
      background-color: rgb(45, 180, 45);
      color: white;
      position: absolute;
      right: 11px;
      top: 30px;
      display: flex;
      font-weight: 700;
      min-width: 20px;
      justify-content: center;
      align-items: center;
      line-height: 20px;
      font-size: 12px;
      padding: 0 4px;
      border-radius: 50%;
    }

    .room {
      flex: 2;
      display: flex;
      align-items: center;
      font-size: 12px;
      font-weight: bold;
      p {
        margin: 10px 0;
        padding: 0;
      }
      img {
        width: 35px;
        border-radius: 50%;
        margin: 0 auto;
      }
      .room-name {
        text-transform: capitalize;
      }
    }
    .contact {
      flex: 3;
      overflow: hidden;
      display: flex;
      flex-direction: column;
      justify-content: center;

      p {
        margin: 0;
        &.name {
          font-size: 15px;
        }
      }
    }
  }
}
</style>