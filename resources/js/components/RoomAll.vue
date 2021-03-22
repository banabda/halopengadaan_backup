<template>
  <div style="height: 85vh" class="">
    <div class="row p-3 button-list" v-if="role[0] != 'super admin'">
      <div
        class="col-md-6 div-button d-flex my-3"
        v-for="(room, index) in rooms"
        :key="index"
      >
        <button class="btn-1 btn btn-primary" @click="startChat(room)">
          {{ room.name }}
        </button>
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
};
</script>
<style lang="scss" scoped>
.button-list {
  align-content: space-evenly;
  height: inherit;
  button {
    background: linear-gradient(to left, #ca4b7c, #6e376e);
    border: none;
  }
}
.btn-1 {
  width: 150px;
  height: 80px;
}

.div-button {
  justify-content: center;
  align-items: center;
}

.admin {
  .btn-1 {
    width: 120px;
    height: 70px;
    margin-left: 0px;
  }
}
</style>