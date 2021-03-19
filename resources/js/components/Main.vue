<template>
  <div class="container chat-component pt-4">
    <Bidang
      v-if="bidang == null && role[0] != 'super admin'"
      :bidang="bidang"
      @selectedBidang="setBidang"
    ></Bidang>
    <room v-else :role="role" :user="user" :bidang="bidang"></room>
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
      bidang: null,
    };
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    setBidang(index) {
      this.bidang = index;
      console.log("bidang value :", this.bidang);
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