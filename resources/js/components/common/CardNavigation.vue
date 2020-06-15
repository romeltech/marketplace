<template>
  <div class="row">
    <div class="col-sm-6 col-md-3 mb-4">
      <div @click="goTo('dashboard')" class="shadow-sm px-3 py-4 bg-white rounded pointer">
        <h6 class="text-uppercase mb-0">Dashboard</h6>
      </div>
    </div>
    <div class="col-sm-6 col-md-3 mb-4">
      <div
        @click="goTo('products')"
        class="shadow-sm px-3 py-4 bg-white rounded d-flex justify-content-between pointer"
      >
        <h6 class="text-uppercase mb-0">Products</h6>
        <span class="badge badge-primary badge-pill">14</span>
      </div>
    </div>
    <div class="col-sm-6 col-md-3 mb-4">
      <div
        @click="goTo('orders')"
        class="shadow-sm px-3 py-4 bg-white rounded d-flex justify-content-between pointer"
      >
        <h6 class="text-uppercase mb-0">Orders</h6>
        <span class="badge badge-primary badge-pill">14</span>
      </div>
    </div>
    <div class="col-sm-6 col-md-3 mb-4">
      <div @click="goTo('inquiries')" class="shadow-sm px-3 py-4 bg-white rounded pointer">
        <h6 class="text-uppercase mb-0">Inquiries</h6>
      </div>
    </div>
    <div class="col-sm-6 col-md-3 mb-4">
      <div
        @click="goTo('messages')"
        class="shadow-sm px-3 py-4 bg-white rounded d-flex justify-content-between pointer"
      >
        <h6 class="text-uppercase mb-0">Messages</h6>
        <span class="badge badge-primary badge-pill">9</span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    user: Object,
    default: null
  },
  methods: {
    goTo(key) {
      let role = "";
      if (this.user.role == 4) {
        role = "buyer";
      } else if (this.user.role == 5) {
        role = "seller";
      } else {
        role = 0;
      }
      this.$router.push({ path: "/" + role + "/" + key }).catch(err => {});
    }
  }
};
</script>