<template>
  <modal
    name="image-preview"
    classes="photo-preview"
    :width="'50%'"
    :height="'auto'"
    transition="scale"
  >
    <div slot="top-right" class="ct-top-right" @click="$modal.hide('photo')">
      Slot for close button
    </div>
    <img :src="imgUrl" />
  </modal>
</template>
<script>
export default {
  name: "ImagePreview",
  props: {
    imgUrl: String,
  },
};
</script>
<style lang="scss">
.photo-preview {
  background-color: transparent;
  box-shadow: 0 2px 20px 0 rgba(0, 0, 0, 0.4);
  border: 1px solid rgba(255, 255, 255, 0.65);
}
.photo-preview img {
  width: inherit;
}
.ct-top-right {
  cursor: pointer;
  margin: 20px;
  padding: 10px 20px;
  font-weight: 600;
  color: white;
  text-shadow: 0 0px 20px black;
  background: #555;
  border-radius: 100px;
}
.scale-enter-active,
.scale-leave-active {
  transition: all 0.5s;
}
.scale-enter,
.scale-leave-active {
  opacity: 0;
  transform: scale(0.3) translateY(24px);
}
</style>