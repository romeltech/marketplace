<template>
  <div>
    <div class="pt-5 mb-3">
      <h1 class="h4">Message</h1>
    </div>
    <div class="my-3 py-3 bg-white rounded shadow-sm">
      <h6 class="border-bottom border-gray pb-2 px-3 mb-0">Received Message</h6>
      <div class="media pt-4 px-3 text-dark bg-white">
        <div
          class="rounded-circle text-white bg-success d-flex justify-content-center align-items-center text-uppercase mr-3"
          style="min-width:40px;width:40px;height:40px;font-size:20px;"
        >{{userInitial(msg.full_name)}}</div>
        <!-- border-bottom border-gray pb-3-->
        <div class="media-body mb-0 lh-125">
          <div class="w-100 mb-3 d-flex flex-wrap justify-content-between align-items-center">
            <h5 class="mb-0">{{msg.full_name}}</h5>
            <small>{{formatDate(msg.created_at)}}</small>
            <small class="w-100 mt-1">{{msg.email}} | {{msg.phone}}</small>
          </div>
          <p>{{msg.message}}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import moment from "moment";
export default {
  data() {
    return {
      msg: {}
    };
  },
  methods: {
    readMessage(m) {
      axios
        .get("/admin/read-message/" + m)
        .then(response => {
          console.log(response.data.message);
        })
        .catch(error => {
          console.log("Error: " + error);
        });
    },
    userInitial(name = "") {
      return name.charAt(0);
    },
    formatDate(d) {
      return moment(d).format("MMMM DD, YYYY");
    },
    getMessage(id) {
      axios
        .get("/admin/get-message/" + id)
        .then(response => {
          this.msg = Object.assign({}, response.data.msg);
          if (this.msg.read == 0) {
            this.readMessage(this.msg.id);
          }
        })
        .catch(error => {
          console.log("Error: " + error);
        });
    }
  },
  mounted() {
    this.$route.params.id && this.getMessage(this.$route.params.id);
  }
};
</script>