<template>
  <div class="bidang card">
    <div class="card-body">
      <div class="row title mb-3">Pilih Bidang</div>
      <div class="card-deck mb-4">
        <div
          class="card item-bidang"
          v-for="(bdng, index) in bidangList"
          :key="index"
        >
          <img
            class="card-img-top"
            src="/images/header.jpg"
            alt="Card image cap"
          />
          <div class="card-body body-bidang">
            <h5 class="card-title mb-3">{{ bdng }}</h5>
            <button class="btn button-bidang" @click="selectBidang(index)">
              Pilih
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      bidangList: [
        "barang",
        "konstruksi",
        "konsultan non konstruksi",
        "swa kelola",
        "jasa lainnya",
      ],
    };
  },
  mounted() {},
  methods: {
    selectBidang(index) {
      this.$emit("selectedBidang", index);
    },
  },
};
</script>
<style lang="scss" scoped>
.title {
  justify-content: center;
  font-size: 50px;
  font-weight: 600;
}
.card-title {
  text-align: center;
}
.card-body.body-bidang {
  height: 200px;
  justify-content: space-between;
  flex-direction: column;
  display: flex;
  align-self: center;
}
img {
  height: 120px;
  object-fit: cover;
}
.button-bidang {
  background: linear-gradient(to left, #ca4b7c, #6e376e);
  color: white;
  width: 100px;
  align-self: center;
  transition: transform 0.3s ease-in-out;
}
.button-bidang:hover {
  transform: scale(1.1);
}
.item-bidang {
  transition: box-shadow 0.3s ease-in-out;
}
.item-bidang:hover {
  box-shadow: 1px 1px 15px 1px rgba(128, 128, 128, 0.726);
}
</style>