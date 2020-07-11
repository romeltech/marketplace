<template>
  <div class="container">
    <card-navigation :user="user" />
    <div>
      <div class="card border-light mb-3 shadow-sm" style="max-width: 100%;">
        <div class="card-body">
          <h4>LEADS</h4>
          <hr />
          <table class="table border">
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
