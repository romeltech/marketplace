<template>
  <div>
    <button @click="placeOrder" class="btn btn-primary" type="button" :disabled="loading == true">
      <span v-if="loading == true" class="spinner-border spinner-border-sm mr-1"></span>
      <span v-html="loading == true ? 'Loading...' : 'Place Order'"></span>
    </button>
  </div>
</template>
<script>
export default {
  props: ["product"],
  data() {
    return {
      loading: false
    };
  },
  methods: {
    placeOrder() {
      this.loading = true;
      console.log("placing order");
      let data = {
          
      }
    }
  },
  mounted() {}
};
</script>