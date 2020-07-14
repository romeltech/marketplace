<template>
  <div>
    <div
      v-for="msg in items"
      :key="msg.id"
      @click="openInquiry(msg.id)"
      :class="`media pt-3 px-3 pointer ${msg.read == 0 ? 'text-dark bg-light' : 'text-muted bg-white' }`"
    >
      <div
        class="rounded-circle text-white bg-success d-flex justify-content-center align-items-center text-uppercase mr-2"
        style="min-width:32px;width:32px;height:32px;font-size:16px;"
      >{{userInitial(msg.full_name)}}</div>
      <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <div class="d-flex justify-content-between align-items-center w-100">
          <span :class="`h6 mb-0 ${msg.read == 0 ? 'font-weight-bold' : ''}`">{{ msg.full_name }}</span>
          <span>{{formatDate(msg.created_at)}}</span>
        </div>
        <span
          :class="`d-block ${msg.read == 0 ? 'font-weight-bold' : ''}`"
        >{{msg.message.substring(0,150)+".." }}</span>
      </div>
    </div>
  </div>
</template>

<script>
import moment from "moment";
export default {
  props: ["items"],
  methods: {
    userInitial(name = "") {
      return name.charAt(0);
    },
    openInquiry(id) {
      this.$emit("selected", id);
    },
    formatDate(d) {
      return moment(d).format("MMMM DD, YYYY");
    }
  }
};
</script>