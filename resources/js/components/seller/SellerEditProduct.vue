<template>
  <div class="row">
    <side-navigation :user-role="userRole"></side-navigation>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-5">
      <div class="pt-5 mb-3">
        <h1 class="h4">Edit Product</h1>
      </div>
      <div class="my-3 p-3 bg-white rounded shadow-sm">
        <ProductForm :user="user" />
      </div>
    </main>
  </div>
</template>
<script>
import ProductForm from "../forms/product/ProductForm";
export default {
  components: {
    ProductForm
  },
  props: {
    user: {
      type: Object,
      default: null
    },
    userRole: {
      user: Object,
      default: null
    }
  }
};
</script>
