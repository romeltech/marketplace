<template>
  <div class="container">
    <card-navigation />
    hey
  </div>
</template>

<script>
export default {
  props: {
    user: Object,
    default: null
  },
  mounted() {
    console.log(this.user);
  }
};
</script>
