<template>
  <modal name="upload-file" height="auto" :width="'80%'" @before-close="setUrl">
    <div class="p-3">
      <h1>Upload File</h1>
      <p>
        Pastikan file berupa gambar atau document. Tidak support file video dan
        audio
      </p>
      <div v-if="localUploadedFile">
        <div>File name : {{ localUploadedFile.name }}</div>
        <div>File type : {{ localUploadedFile.type }}</div>
        <div>File size : {{ localUploadedFile.size }}</div>
        <!-- <div>File path : {{ localUploadedFile.path }}</div> -->
        <img
          v-if="localUploadedFile.type.includes('image')"
          :src="localUploadedFile.path"
          :alt="localUploadedFile.name"
          height="150px"
        />
      </div>
      <div class="input-group mt-3">
        <div class="custom-file">
          <input
            type="file"
            accept="*/*"
            class="custom-file-input"
            id="inputGroupFile04"
            @click="chooseFile"
            @change="setFile"
          />
          <label class="custom-file-label" for="inputGroupFile04">{{
            localUploadedFile ? localUploadedFile.name : "Choose File"
          }}</label>
        </div>
      </div>
      <div class="filebtn d-flex mt-3">
        <button
          v-if="localUploadedFile"
          class="btn btn-danger"
          @click="removeFile"
        >
          remove
        </button>
      </div>
    </div>
  </modal>
</template>
<script>
export default {
  name: "UploadFile",
  props: {
    uploadedFile: {
      type: Object,
      require: true,
    },
  },
  data() {
    return {
      test: "asdsada",
      localUploadedFile: null,
    };
  },
  mounted() {
    this.localUploadedFile = this.uploadedFile;
  },
  methods: {
    removeFile() {
      this.localUploadedFile = null;
    },
    setFile(event) {
      var _file = event.target.files[0];
      var _Ufile = {};
      _Ufile.name = _file.name;
      _Ufile.size = _file.size;
      _Ufile.type = _file.type;

      const formData = new FormData();
      formData.append("file", _file);
      formData.append("name", _file.name);

      axios
        .post("/chat/conversation/uploadFile", formData, {
          headers: { "Content-Type": "multipart/form-data" },
        })
        .then((res) => {
          _Ufile.path = res.data.media_url;
          this.localUploadedFile = _Ufile;
        });
    },
    chooseFile() {
      // console.log("onclick");
    },
    setUrl() {
      this.$emit("file", this.localUploadedFile);
    },
  },
  watch: {
    uploadedFile(uploadedFile) {
      this.localUploadedFile = uploadedFile;
    },
  },
};
</script>