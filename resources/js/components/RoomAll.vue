<template>
  <div style="height: 85vh" class="room-all card">
    <div class="back d-flex" @click="$emit('back')">
      <div class="back-div">
        <img
          src="/images/bidang/back.svg"
          alt="back"
          class="back-button mr-2"
        />
        <div class="font-weight-bold">Kembali untuk pilih bidang</div>
      </div>
    </div>
    <div class="row pt-3 button-list px-4" v-if="role[0] != 'super admin'">
      <div
        class="col-md-6 div-button d-flex"
        v-for="(room, index) in rooms"
        :key="index"
      >
        <!-- :src="'/images/bidang/bidang' + (index + 1) + '.svg'" -->
        <img
          class="btn-1 ml-md-4"
          :class="[
            room.narasumber_id ? '' : 'disabled',
            room.user_id ? 'disabled' : '',
          ]"
          :src="
            '/images/room/' +
            bidangList[room.bidang_code] +
            ' ' +
            (index + 1) +
            '.svg'
          "
          @click="startChat(room)"
        />
        <div class="in-room ml-3">
          <div :class="room.user_name ? 'font-weight-bold' : ''">
            {{ room.user_name ? "Room sedang digunakan" : "no user" }}
          </div>
          <div :class="room.narasumber_name ? 'font-weight-bold' : ''">
            {{
              room.narasumber_id
                ? "Narasumber " + room.narasumber_id
                : "no narasumber"
            }}
          </div>
        </div>
      </div>
    </div>
    <div class="row p-3 button-list admin" v-else>
      <div
        class="col-md-3 div-button d-flex my-3"
        v-for="(room, index) in rooms"
        :key="index"
      >
        <button class="btn-1" @click="startChat(room)">
          {{ room.name }}
        </button>
        <div class="in-room ml-3">
          <div>{{ room.user ? room.user : "no user" }}</div>
          <div>{{ room.narasumber ? room.user : "no narasumber" }}</div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    role: { type: Array, require: true },
    rooms: { type: Array, require: true },
  },
  methods: {
    startChat(room) {
      if (room.narasumber_id !== null && room.user_id === null) {
        this.$emit("chat", room);
      }
    },
  },
  data() {
    return {
      bidangList: [
        "barang",
        "konstruksi",
        "konsultasi",
        "swakelola",
        "lainnya",
        "perencanaan",
        "pemilihan",
        "kontrak",
      ],
    };
  },
};
</script>
<style lang="scss" scoped>
.back {
  position: relative;
  padding: 8px 8px 8px 16px;
  cursor: pointer;
  .back-div {
    font-size: 1rem;
    justify-content: center;
    align-items: center;
    padding: 16px 4px;
    width: 200px;
    height: 80px;
    display: flex;
    // border-radius: 8px;
    // background-color: white;
    // box-shadow: 0px 3px 4px 3px rgb(128 128 128 / 10%);
    .back-button {
      height: 40px;
    }
  }
}
.button-list {
  overflow-y: scroll;
  // align-content: space-evenly;
  height: 85vh;
  button {
    background: linear-gradient(to left, #ca4b7c, #6e376e);
    border: none;
  }
}
.btn-1 {
  width: 200px;
  cursor: pointer;
  &.disabled {
    cursor: default;
  }
}

.div-button {
  align-items: center;
  height: 100px;
}

.admin {
  .btn-1 {
    width: 120px;
    height: 70px;
    margin-left: 0px;
  }
}
</style>