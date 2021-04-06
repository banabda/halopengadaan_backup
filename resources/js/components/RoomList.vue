<template>
  <div class="room-list">
    <div class="sort" v-if="role[0] !== 'user'">
      <div class="sort-div">
        <!-- <img
          src="/images/bidang/back.svg"
          alt="back"
          class="back-button mr-2"
        /> -->
        <div class="font-weight-bold text-center">Urutkan Room</div>
        <div class="sort-btn d-flex">
          <button class="btn btn-room" @click="$emit('sortById')">id</button>
          <button class="btn btn-room" @click="$emit('sortByBidang')">
            bidang
          </button>
          <button class="btn btn-room" @click="$emit('sortByActive')">
            aktif
          </button>
        </div>
      </div>
    </div>
    <ul class="room-list-content">
      <li
        v-for="room in rooms"
        :key="room.id"
        @click="selectedRoom(room)"
        class="the-room"
      >
        <div
          class="the-room"
          :class="
            roomselect ? (roomselect.id == room.id ? 'roomselected' : '') : ''
          "
        >
          <div class="room p-2 text-center">
            <!-- <img :src="room.profile_image" :alt="room.name" /> -->
            <h6 class="room-name">
              {{ room.name }}
            </h6>
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
    role: { type: Array, default: [] },
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
    // console.log(this.$vssWidth, this.$vssHeight);
  },
  methods: {
    selectedRoom(rm) {
      this.$emit("selected", rm);
    },
  },
  watch: {
    $vssWidth($vssWidth) {
      // console.log("Width", $vssWidth);
    },
    $vssHeight($vssHeight) {
      // console.log("Height", $vssHeight);
    },
  },
};
</script>
<style lang="scss" scoped>
.sort-button {
  height: 40px;
}
.room-list-content,
.room-list .sort,
.room-list:hover,
.room-list:focus {
  visibility: visible;
}
.room-list {
  max-height: 85vh;
  // background-color: blue;
  visibility: hidden;
  overflow-y: auto;
  transition: flex 0.2s ease-in-out;
  flex: 2;
  .sort {
    padding: 8px 8px 8px 16px;
    .sort-div {
      font-size: 1rem;
      display: grid;
      height: 120px;
      align-items: center;
      padding: 16px 4px;
      width: 100%;
      border-radius: 8px;
      background-color: white;
      box-shadow: 0px 3px 6px rgb(128 128 128 / 30%);
      .sort-btn {
        justify-content: space-around;
        .btn-room {
          background-color: transparent;
          color: #6e376e;
          border-color: #6e376e;
          &:hover {
            background-color: #6e376e;
            color: white;
          }
        }
        button {
          width: 60px;
          padding: 6px 0;
        }
      }
    }
  }
  ul {
    padding: 8px 8px 16px 16px;
    list-style-type: none;
    li {
      margin-bottom: 16px;
      position: relative;
      cursor: pointer;
      .the-room {
        &.roomselected {
          background: linear-gradient(to left, #ca4b7c, #6e376e);
          color: white;
        }
        padding: 16px 4px;
        width: 100%;
        display: flex;
        border-radius: 8px;
        background-color: white;
        box-shadow: 0px 3px 6px rgb(128 128 128 / 30%);
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
        font-weight: bolder;
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