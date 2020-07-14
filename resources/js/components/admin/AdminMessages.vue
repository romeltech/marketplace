<template>
  <div>
    <div class="pt-5 mb-3">
      <h1 class="h4">Messages</h1>
    </div>
    <div class="my-3 py-3 bg-white rounded shadow-sm">
      <h6 class="border-bottom border-gray pb-2 px-3 mb-0">Received Messages</h6>
      <div
        v-for="msg in messages"
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
      <!-- <small class="d-block text-right mt-3">
        <a href="#">All updates</a>
      </small>-->
    </div>
  </div>
</template>

<script>
import moment from "moment";
export default {
  data() {
    return {
      messages: null
    };
  },
  methods: {
    userInitial(name = "") {
      return name.charAt(0);
    },
    openInquiry(id) {
      this.$router.push({ path: `/admin/message/${id}` }).catch(err => {});
    },
    formatDate(d) {
      return moment(d).format("MMMM DD, YYYY");
    },
    getMessages(p) {
      axios
        .get("/admin/get-messages?page=" + p)
        .then(response => {
          this.messages = Object.assign({}, response.data.messages.data);
          //   this.page = Object.assign({}, response.data.messages, {
          //     data: undefined
          //   });
          // console.log(this.messages);
        })
        .catch(error => {
          console.log("Error: " + error);
        });
    }
  },
  mounted() {
    this.getMessages(1);
  }
};
</script>

<style>
</style>