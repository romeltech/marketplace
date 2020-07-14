<template>
  <div>
    <div class="pt-5 mb-3">
      <h1 class="h4">Messages</h1>
    </div>
    <div class="my-3 py-3 bg-white rounded shadow-sm">
      <h6 class="border-bottom border-gray pb-2 px-3 mb-0">Received Messages</h6>
      <msgs-list-card :items="messages" @selected="pushRoute"></msgs-list-card>
    </div>
  </div>
</template>

<script>
import MsgsListCard from "../common/MsgsListCard";
export default {
  components: {
    MsgsListCard
  },
  data() {
    return {
      messages: null
    };
  },
  methods: {
    pushRoute(id) {
      this.$router.push({ path: `/admin/message/${id}` }).catch(err => {});
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