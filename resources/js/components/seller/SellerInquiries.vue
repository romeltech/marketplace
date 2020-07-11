<template>
  <div class="container">
    <card-navigation :user="user" />
    <div>
      <div class="card border-light mb-3 shadow-sm" style="max-width: 100%;">
        <div class="card-body">
          <h4>INQUIRIES</h4>
          <hr />
          <table class="table border">
            <tbody>
              <tr
                @click="openInquiry(inquiry.id)"
                v-for="inquiry in inquiries "
                :key="inquiry.id"
                :class="`pointer ${ inquiry.read  == 0 ? 'unread' : ''}`"
              >
                <th width="30%" class="font-weight-normal">{{inquiry.from.name}}</th>
                <td width="45%">{{ JSON.parse(inquiry.product_details).title }}</td>
                <td class="w-25 text-right">{{ formatDate(inquiry.created_at) }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import moment from "moment";
export default {
  props: {
    user: Object,
    default: null
  },
  data() {
    return {
      inquiries: {}
    };
  },
  methods: {
    openInquiry(id) {
      this.$router.push({ path: `/seller/inquiry/${id}` }).catch(err => {});
    },
    formatDate(d) {
      return moment(d).format("MMMM DD, YYYY");
    },
    getInquiries() {
      axios
        .get("/seller/get-inquiries")
        .then(response => {
          this.inquiries = Object.assign({}, response.data.inquiries.data);
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
