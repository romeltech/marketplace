<template>
  <div class="col-12 pb-3">
    <form>
      <div class="shadow-sm bg-white rounded">
        <div class="d-flex align-items-center justify-content-between pt-3 px-3 pb-0" style="height:60px;">
          <h4 class="mb-0">Create Product</h4>
          <div v-if="loading == false">
            <button type="button" class="btn btn-light ml-2" @click="save('draft')">Save as Draft</button>
            <button
              v-if="this.$route.params.id"
              type="button"
              class="btn btn-primary ml-2"
              @click="save('update')"
            >Update</button>
            <button
              v-else
              type="button"
              class="btn btn-primary ml-2"
              @click="save('publish')"
            >Publish</button>
          </div>
          <div v-else class="alert alert-light d-flex align-items-center mb-0 px-3" role="alert">
            <div class="spinner-border spinner-border-sm mr-2" role="status">
              <span class="sr-only">Loading...</span>
            </div>
            <span>Loading...</span>
          </div>
        </div>
        <hr />
        <div class="col-md-8 pb-3">
          <div class="form-group">
            <label for="title">Title</label>
            <ValidationProvider :rules="{ regex: /^[a-zA-Z0-9 -]+$/ }" mode="eager">
              <div slot-scope="{ errors }">
                <input
                  v-model="product.title"
                  :class="`form-control ${ errors[0] ? 'is-invalid' : ''}`"
                  id="title"
                />
                <span v-if="errors" class="text-danger">{{ errors[0] }}</span>
              </div>
            </ValidationProvider>
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <ValidationProvider rules="required|max:500" mode="eager">
              <div slot-scope="{ errors }">
                <textarea
                  v-model="product.description"
                  :class="`form-control ${ errors[0] ? 'is-invalid' : ''}`"
                  id="description"
                />
                <span v-if="errors" class="text-danger">{{ errors[0] }}</span>
              </div>
            </ValidationProvider>
          </div>
        </div>
      </div>
    </form>
    <Toast :status="toastData.status" :message="toastData.message" :type="toastData.type" />
  </div>
</template>

<script>
import {
  ValidationProvider,
  ValidationObserver
} from "vee-validate/dist/vee-validate.full";

export default {
  components: {
    ValidationObserver,
    ValidationProvider
  },
  data() {
    return {
      action: "",
      product: {
        title: "",
        description: ""
      },
      toastData: {
        status: null,
        type: "",
        message: ""
      },
      loading: false
    };
  },
  props: {
    user: {
      type: Object,
      default: null
    }
  },
  methods: {
    clearToast() {
      this.toastData.message = "";
      this.toastData.type = "";
      this.toastData.status = null;
    },
    toastUI(m, t, s) {
      this.toastData.message = m;
      this.toastData.type = t;
      this.toastData.status = s;
      setTimeout(() => {
        this.clearToast();
      }, 5000);
    },
    save(action) {
      this.clearToast();
      this.loading = true;
      let route = "";
      let data = {
        title: this.product.title,
        description: this.product.description,
        status: action === "draft" ? 0 : 1
      };
      if (action === "update") {
        route = "/product/update/" + this.product.id;
      } else {
        if (this.$route.params.id) {
          route = "/product/update/" + this.product.id;
        } else {
          route = "/product/store";
        }
      }
      axios
        .post(route, data)
        .then(response => {
          this.toastUI(response.data.message, "success", true);
          this.loading = false;
          console.log(response.data);
        })
        .catch(error => {
          this.loading = false;
          this.toastUI(error.response.data.message, "error", true);
          console.log(error.response.data);
        });
    },
    getProduct(id) {
      axios
        .get("/seller/product/get/" + id)
        .then(response => {
          this.product = Object.assign({}, response.data.product);
        })
        .catch(error => {
          console.log("Error: " + error);
        });
    }
  },
  created() {
    this.$route.params.id && this.getProduct(this.$route.params.id);
  }
};
</script>