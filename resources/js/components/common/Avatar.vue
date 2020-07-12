<template>
  <div class="d-flex align-items-center py-2 px-3" style="min-width:200px;width:auto;">
    <div
      class="rounded-circle text-white bg-success d-flex justify-content-center align-items-center text-uppercase"
      style="min-width:40px;width:40px;height:40px;font-size:20px;"
    >{{userInitial(user.name)}}</div>
    <h6 class="mb-0 ml-2">
      {{userName(user.name)}}
      <br />
      <small>{{user.email}}</small>
    </h6>
  </div>
</template>

<script>
export default {
  props: ["user"],
  methods: {
    userInitial(name = "") {
      return name.charAt(0);
    },
    userName(name = "") {
      return name
        .split(" ")
        .slice(0, 2)
        .join(" ");
    }
  }
};
</script>