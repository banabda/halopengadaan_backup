<template>
  <div class="bidang card">
    <div class="card-body">
      <div class="row title mb-3">Pilih Bidang</div>
      <div class="row row-cols-1 row-cols-md-3">
        <div class="col mb-4" v-for="(bdng, index) in bidangList" :key="index">
          <div class="card h-100">
            <img
              :src="'/images/bidang/bidang' + (index + 1) + '.svg'"
              class="card-img-top"
              :alt="bdng"
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
  </div>
</template>
<script>
export default {
  data() {
    return {
      bidangList: [
        "barang",
        "jasa konstruksi",
        "konsultasi non konstruksi",
        "swakelola",
        "jasa lainnya",
        "perencanaan",
        "pemilihan",
        "pelaksanaan kontrak",
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
  font-weight: bold;
  font-size: 1.5rem;
  text-transform: capitalize;
}
.card-body.body-bidang {
  height: 150px;
  justify-content: space-between;
  flex-direction: column;
  display: flex;
  align-self: center;
}
img {
  object-fit: contain;
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