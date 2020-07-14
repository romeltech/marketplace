<template>
  <div class="row">
    <side-navigation :user-role="userRole"></side-navigation>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-5">
      <div class="pt-5 mb-3">
        <h1 class="h4">Leads</h1>
      </div>
      <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Recent leads</h6>
        <table class="table border mt-3">
          <tbody>
            <tr
              @click="openLead(lead.id)"
              v-for="lead in leads "
              :key="lead.id"
              :class="`pointer ${ lead.read  == 0 ? 'font-weight-bold bg-light' : 'font-weight-normal'}`"
            >
              <td width="30%">{{lead.from.name}}</td>
              <td width="45%">{{ JSON.parse(lead.product_details).title }}</td>
              <td class="w-25 text-right">{{ formatDate(lead.created_at) }}</td>
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
      default: ""
    }
  },
  data() {
    return {
      leads: {}
    };
  },
  methods: {
    openLead(id) {
      this.$router.push({ path: `/seller/lead/${id}` }).catch(err => {});
    },
    formatDate(d) {
      return moment(d).format("MMMM DD, YYYY");
    },
    getInquiries() {
      axios
        .get("/seller/get-leads")
        .then(response => {
          this.leads = Object.assign({}, response.data.leads.data);
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
