<template>
  <div>
    <div
      v-if="alertStatus == true"
      :class="`alert mt-3 ${alertType == 'success' ? 'alert-success' : 'alert-danger' }`"
      role="alert"
    >
      <h4 class="alert-heading" v-html="alertType == 'success' ? 'Thank you!' : 'Oh no!'"></h4>
      <p>{{alertMessage}}</p>
    </div>
  </div>
</template>

<script>
export default {
  props: ["status", "message", "type"],
  data() {
    return {
      alertMessage: "No Message",
      alertType: "info",
      alertStatus: null
    };
  },
  watch: {
    status() {
      this.alertStatus = this.status;
      this.alertMessage = this.message;
      this.alertType = this.type;
    }
  }
};
</script>