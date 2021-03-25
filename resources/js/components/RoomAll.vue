<template>
  <div style="height: 85vh" class="room-all card">
    <div class="row pt-3 button-list" v-if="role[0] != 'super admin'">
      <div
        class="col-md-6 div-button d-flex"
        v-for="(room, index) in rooms"
        :key="index"
      >
        <!-- :src="'/images/bidang/bidang' + (index + 1) + '.svg'" -->
        <img
          class="btn-1"
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
            {{ room.user_name ? room.user_name : "no user" }}
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
      this.$emit("chat", room);
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
.button-list {
  overflow-y: scroll;
  align-content: space-evenly;
  height: inherit;
  button {
    background: linear-gradient(to left, #ca4b7c, #6e376e);
    border: none;
  }
}
.btn-1 {
  width: 200px;
  cursor: pointer;
}

.div-button {
  justify-content: center;
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