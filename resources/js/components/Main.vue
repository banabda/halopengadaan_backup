<template>
  <div class="container chat-component pt-4">
    <Bidang
      v-if="bidang == null && role[0] != 'super admin'"
      :bidang="bidang"
      @selectedBidang="setBidang"
    ></Bidang>
    <room
      v-else
      :role="role"
      :user="user"
      :bidang="bidang"
      @back="removeBidang"
    ></room>
  </div>
</template>

<script>
import Bidang from "./Bidang";
import Room from "./Room.vue";
export default {
  props: {
    user: { type: Object, require: true },
    role: { type: Array, require: true },
  },
  data() {
    return {
      onlineNarasumber: [],
      bidang: null,
    };
  },
  mounted() {
    console.log("Component mounted.");
    Echo.join("onlineuser")
      .here((users) => {
        users.forEach((usr) => {
          if (usr.role === "narasumber") {
            this.onlineNarasumber.push(usr);
          }
        });
        console.log("here", users);
      })
      .joining((user) => {
        console.log("joining", user);
      })
      .leaving((user) => {
        console.log("leaving", user);
      });
    if (this.role == "user" && JSON.parse(localStorage.getItem("room"))) {
      this.bidang = JSON.parse(localStorage.getItem("room")).bidang_code;
    }
  },
  methods: {
    removeBidang() {
      this.bidang = null;
    },
    setBidang(index) {
      this.bidang = index;
      // console.log("bidang value :", this.bidang);
    },
  },
  components: { Bidang, Room },
};
</script>
<style lang="scss" scoped>
.chat-component {
  margin-top: 57px;
}
</style>