<template>
  <div class="container">
    <card-navigation :user="user" />
    <div>
      <div class="card border-light mb-3 shadow-sm" style="max-width: 100%;">
        <div class="card-body">
          <h4>Lead</h4>
          <hr />
          <div class="card border-light">
            <div class="card-header bg-light d-flex justify-content-start align-items-center">
              <div
                class="rounded-circle text-white bg-success d-flex justify-content-center align-items-center text-uppercase"
                style="width:50px;height:50px;font-size:24px;"
              >{{userInitial(fromUser.name)}}</div>
              <h5 class="mb-0 ml-3">
                {{fromUser.name}}
                <br />
                <small>
                  {{fromUser.email}} |
                  {{fromUser.phone}}
                </small>
              </h5>
            </div>
            <div class="card-body">
              <p class="card-text">{{ message }}</p>
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
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    user: Object,
    default: null
  },
  data() {
    return {
      lead: null,
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
      }else{
        console.log('already read')
      }
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
    // setTimeout(() => {}, 1);
  }
};
</script>