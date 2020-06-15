<template>
  <div class="row">
    <div class="col-md-3">
      <router-link to="/admin/dashboard" style="text-decoration: none;">
        <div class="shadow-sm px-3 py-4 bg-white rounded">
          <h6 class="text-uppercase mb-0">Dashboard</h6>
        </div>
      </router-link>
    </div>
    <div class="col-md-3">
      <router-link to="/admin/dashboard" style="text-decoration: none;">
        <div class="shadow-sm px-3 py-4 bg-white rounded d-flex justify-content-between">
          <h6 class="text-uppercase mb-0">Orders</h6>
          <span class="badge badge-primary badge-pill">14</span>
        </div>
      </router-link>
    </div>
    <div class="col-md-3">
      <router-link to="/admin/dashboard" style="text-decoration: none;">
        <div class="shadow-sm px-3 py-4 bg-white rounded">
          <h6 class="text-uppercase mb-0">Inquiries</h6>
        </div>
      </router-link>
    </div>
    <div class="col-md-3">
      <router-link to="/admin/dashboard" style="text-decoration: none;">
        <div class="shadow-sm px-3 py-4 bg-white rounded d-flex justify-content-between">
          <h6 class="text-uppercase mb-0">Messages</h6>
          <span class="badge badge-primary badge-pill">9</span>
        </div>
      </router-link>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Seller Products.");
  }
};
</script>
