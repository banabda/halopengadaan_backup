<template>
  <div class="container chat-component pt-4">
    <Bidang
      v-if="bidang == null && role[0] == 'user'"
      :bidang="bidang"
      :bidangList="bidangList"
      :narasumber="onlineNarasumber"
      @selectedBidang="setBidang"
    ></Bidang>
    <room
      v-else-if="role[0] == 'super admin' || bidang != null"
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
      bidangList: null,
    };
  },
  mounted() {
    if (this.role[0] == "narasumber") {
      axios
        .get("/chat/keahlian/" + this.user.id)
        .then((e) => (this.bidang = e.data));
    }
    // console.log("Component mounted.");
    axios.get("/chat/bidang").then((e) => (this.bidangList = e.data));
    Echo.join("onlineuser")
      .here((users) => {
        users.forEach((usr) => {
          if (usr.role === "narasumber") {
            this.onlineNarasumber.push(usr);
          }
        });
      })
      .joining((user) => {
        if (user.role === "narasumber") {
          this.onlineNarasumber.push(user);
        }
      })
      .leaving((user) => {
        if (user.role === "narasumber") {
          this.onlineNarasumber.splice(
            this.onlineNarasumber.findIndex((el) => el.id === user.id),
            1
          );
          axios.get("/chat/lastonline");
        }
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
  watch: {
    onlineNarasumber(onlineNarasumber) {
      this.onlineNarasumber = onlineNarasumber;
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