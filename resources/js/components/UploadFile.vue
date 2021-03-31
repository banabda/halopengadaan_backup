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
          class="btn btn-danger mr-3"
          @click="removeFile"
        >
          remove
        </button>
        <button
          v-if="localUploadedFile"
          class="btn btn-success"
          @click="sendFile"
        >
          Send
        </button>
      </div>
    </div>
  </modal>
</template>
<script>
import Swal from "sweetalert2";
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
      Swal.fire({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        icon: "warning",
        title: "File Removed!",
      });
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
          Swal.fire({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            icon: "success",
            title: "File Uploaded!",
          });
        });
    },
    sendFile() {
      this.$loading(true);
      this.$emit("file", this.localUploadedFile);
    },
    chooseFile() {
      // console.log("onclick");
    },
    setUrl() {},
  },
  watch: {
    uploadedFile(uploadedFile) {
      this.localUploadedFile = uploadedFile;
    },
  },
};
</script>