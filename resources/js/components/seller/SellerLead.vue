<template>
  <div class="row">
    <side-navigation :user-role="userRole"></side-navigation>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-5">
      <div class="pt-5 mb-3">
        <h1 class="h4">Lead</h1>
      </div>
      <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Recent lead</h6>
        <div class="media pt-4 px-3 text-dark bg-white">
          <div
            class="rounded-circle text-white bg-success d-flex justify-content-center align-items-center text-uppercase mr-3"
            style="min-width:40px;width:40px;height:40px;font-size:20px;"
          >{{userInitial(fromUser.name)}}</div>
          <!-- border-bottom border-gray pb-3-->
          <div class="media-body mb-0 lh-125">
            <div class="w-100 mb-3 d-flex flex-wrap justify-content-between align-items-center">
              <h5 class="mb-0">{{fromUser.name}}</h5>
              <small>{{formatDate(lead.created_at)}}</small>
              <small class="w-100 mt-1">
                {{fromUser.email}} |
                {{fromUser.phone}}
              </small>
            </div>
            <p>{{message}}</p>
            <h5 class="card-title">
              <small>Inquired for:</small>
            </h5>
            <div class="shadow-sm rounded p-3 mb-3" style="max-width: 18rem;">
              <p class="card-text">{{productDetails.title}}</p>
            </div>
            <a href="#" class="btn btn-primary">Message {{fromUser.name}}</a>
          </div>
        </div>
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
      lead: [],
      message: "",
      fromUser: {},
      productDetails: {}
    };
  },
  methods: {
    readLead(i) {
      if (i.read == 0) {
        axios
          .get("/seller/read-lead/" + i.id)
          .then(response => {
            console.log(response.data);
          })
          .catch(error => {
            console.log("Error: " + error);
          });
      } else {
        console.log("already read");
      }
    },
    formatDate(d) {
      return moment(d).format("MMMM DD, YYYY");
    },
    userInitial(name = "") {
      return name.charAt(0);
    },
    getInquiry(id) {
      axios
        .get("/seller/get-lead/" + id)
        .then(response => {
          this.lead = Object.assign({}, response.data.lead);
          this.name = this.lead.from.name;
          this.message = JSON.parse(this.lead.content).message;
          this.fromUser = Object.assign({}, this.lead.from);
          this.productDetails = Object.assign(
            {},
            JSON.parse(this.lead.product_details)
          );
          this.readLead(this.lead);
        })
        .catch(error => {
          console.log("Error: " + error);
        });
    }
  },
  mounted() {
    this.$route.params.id && this.getInquiry(this.$route.params.id);
  }
};
</script>