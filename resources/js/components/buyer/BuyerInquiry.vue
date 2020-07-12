<template>
  <div class="container">
    <card-navigation :user="user" />
    <div>
      <div class="card border-light shadow-sm">
        <div class="card-header bg-white d-flex justify-content-start align-items-center">
          <h4 class="py-2 m-0">INQUIRY</h4>
          <span @click="$router.go(-1)">
            <i class="mdi mdi-undo-variant ml-2 pointer text-primary" style="font-size:16px;"></i>
          </span>
        </div>
        <div class="card-body">
          <div class="d-flex align-items-center mb-3">
            <div
              class="rounded-circle text-white bg-success d-flex justify-content-center align-items-center text-uppercase"
              style="width:50px;height:50px;font-size:24px;"
            >{{userInitial(toUser.name)}}</div>
            <h5 class="mb-0 ml-3">
              {{toUser.name}}
              <br />
              <small>
                {{toUser.email}} -
                {{toUser.phone}}
              </small>
            </h5>
          </div>
          <div class="card-text card-text p-3 bg-light rounded">
            <p>{{ message }}</p>
            <hr />
            <h5 class="card-title">
              <small>Inquired for:</small>
            </h5>
            <div class="shadow-sm rounded p-3 bg-white" style="max-width: 18rem;">
              <h5 class="mb-0">{{productDetails.title}}</h5>
            </div>
          </div>
          <a href="#" class="btn btn-primary mt-3">Message {{toUser.name}}</a>
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
      inquiry: null,
      message: "",
      toUser: {},
      fromUser: {},
      productDetails: {}
    };
  },
  methods: {
    back() {
      console.log("back");
    },
    userInitial(name = "") {
      return name.charAt(0);
    },
    getInquiry(id) {
      axios
        .get("/buyer/get-inquiry/" + id)
        .then(response => {
          this.inquiry = Object.assign({}, response.data.inquiry);
          this.name = this.inquiry.to.name;
          this.message = JSON.parse(this.inquiry.content).message;
          this.toUser = Object.assign({}, this.inquiry.to);
          this.productDetails = Object.assign(
            {},
            JSON.parse(this.inquiry.product_details)
          );
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