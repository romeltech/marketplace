<template>
  <div class="container">
    <card-navigation :user="user" />
    <div class="row">
      <ProductForm :user="user"/>
    </div>
  </div>
</template>

<script>
import ProductForm from '../forms/product/ProductForm'
export default {
  components:{
    ProductForm
  },
  props: {
    user: Object,
    default: null
  },
  mounted() {
    // console.log(this.user);
  }
};
</script>
