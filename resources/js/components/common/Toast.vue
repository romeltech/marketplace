<template>
  <div v-if="toastStatus == true" class="toast-wrapper">
    <div :class="`toast text-white ${ type == 'error' ? 'bg-danger' : 'bg-success'}`">
      <div class="toast-body">
        <span>{{ toastMessage }}</span>
        <button type="button" class="ml-2 mb-1 close" @click="toastStatus = null">
          <span>&times;</span>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["status", "message", "type"],
  data() {
    return {
      toastMessage: "No Message",
      toastType: "info",
      toastStatus: null
    };
  },
  watch: {
    status() {
      if (this.toastMessage != true) {
        this.toastStatus = this.status;
        this.toastMessage = this.message;
        this.toastType = this.type;
      }
    }
  }
};
</script>
<style lang="scss" scoped>
.toast-wrapper {
  position: fixed;
  bottom: 30px;
  left: 0;
  right: 0;
  top: auto;
  .toast {
    opacity: 1;
    border: 0;
    margin: 0 auto;
  }
}
</style>