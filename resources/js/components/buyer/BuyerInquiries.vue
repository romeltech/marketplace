<template>
  <div class="row">
    <side-navigation :user-role="userRole"></side-navigation>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-5">
      <div class="pt-5 mb-3">
        <h1 class="h4">My Inquiries</h1>
      </div>
      <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-3">Recent Inquiries</h6>
        <table class="table border">
          <tbody>
            <tr
              @click="openInquiry(inquiry.id)"
              v-for="inquiry in inquiries "
              :key="inquiry.id"
              class="pointer font-weight-normal"
            >
              <td width="30%">{{inquiry.to.name}}</td>
              <td width="45%">{{ JSON.parse(inquiry.product_details).title }}</td>
              <td class="w-25 text-right">{{ formatDate(inquiry.created_at) }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</template>
<script>
import moment from "moment";
export default {
  props: {
    user: {
      type: Object,
      default: null
    },
    userRole: {
      type: String,
      default: null
    }
  },
  data() {
    return {
      inquiries: {}
    };
  },
  methods: {
    openInquiry(id) {
      this.$router.push({ path: `/buyer/inquiry/${id}` }).catch(err => {});
    },
    formatDate(d) {
      return moment(d).format("MMMM DD, YYYY");
    },
    getInquiries() {
      axios
        .get("/c/inquiries")
        .then(response => {
          this.inquiries = Object.assign({}, response.data.inquiries.data);
          console.log(this.inquiries);
        })
        .catch(error => {
          console.log("Error: " + error);
        });
    }
  },
  mounted() {
    this.getInquiries();
  }
};
</script>
