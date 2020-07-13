<template>
  <div class="container">
    <card-navigation :user="user" />
    <div>this is buyer's dashboard</div>
  </div>
</template>

<script>
export default {
  props: {
    user: Object,
    default: null
  }
};
</script>
