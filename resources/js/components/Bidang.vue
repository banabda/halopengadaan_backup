<template>
  <div class="bidang card">
    <div class="card-body">
      <div class="row title mb-3">Pilih Bidang</div>
      <div class="row row-cols-1 row-cols-md-3">
        <div
          class="col mb-4 the-div"
          v-for="(bdng, index) in bidangList"
          :key="index"
        >
          <div class="card h-100 wrap-card">
            <img
              :src="'/images/bidang/bidang' + (index + 1) + '.svg'"
              class="card-img-top"
              :alt="bdng.name"
            />
            <div class="card-body body-bidang">
              <div class="nara-list">
                <h5 class="card-title mb-3">{{ bdng.name }}</h5>
                <h4 class="mb-1">Narasumber yang tersedia:</h4>
                <ul class="p-0">
                  <li
                    v-for="(nara, index) in narasumber"
                    :key="index"
                    class="list-narasumber"
                  >
                    <div
                      class="narasumber-name d-flex"
                      v-if="
                        nara.utama.findIndex((el) => el.id === bdng.id) !==
                          -1 ||
                        nara.pendukung.findIndex((el) => el.id === bdng.id) !==
                          -1
                      "
                    >
                      <span class="status-nara mr-2"></span>Narasumber
                      {{ nara.id }}
                    </div>
                    <div
                      v-else-if="narasumber.length == index + 1"
                      class="narasumber-name"
                    >
                      Tidak ada narasumber
                    </div>
                  </li>
                </ul>
              </div>

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
  props: {
    bidangList: { type: Array, require: true },
    narasumber: { type: Array },
  },
  mounted() {},
  methods: {
    selectBidang(index) {
      this.$emit("selectedBidang", index);
    },
  },
  watch: {
    bidangList(bidangList) {
      this.bidangList = bidangList;
    },
  },
};
</script>
<style lang="scss" scoped>
.the-div {
  min-height: 500px;
}
.wrap-card {
  align-items: center;
}
.list-narasumber {
  list-style-type: none;
}
.narasumber-name {
  font-weight: 700;
  font-size: 1.3rem;
  align-items: center;
}
.status-nara {
  width: 14px;
  height: 14px;
  background-color: rgb(49, 255, 49);
  border-radius: 50%;
  border: none;
}
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
  width: 75%;
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