<template>
  <div class="container">
    <card-navigation :user="user"/>
    this is inquiries
  </div>
</template>

<script>
export default {
  props: {
    user: Object,
    default: null
  },
  mounted() {
    // console.log(this.user);
  }
};
</script>
