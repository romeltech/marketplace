<template>
  <div class="col-sm-12 col-md-6">
    <form v-if="submitted != true">
      <div class="form-group">
        <label for="email">Vendor</label>
        <!-- Should be company details -->
        <input :value="product.user.name" type="text" class="form-control" id="email" readonly />
      </div>
      <div class="form-group">
        <label for="inquire-for">Inquire for</label>
        <input
          v-model="product.title"
          type="text"
          class="form-control"
          id="inquire-for"
          readonly
        />
      </div>
      <ValidationProvider rules="required|min:20|max:500" mode="eager">
        <div slot-scope="{ errors }">
          <div class="form-group">
            <label for="message">Message</label>
            <textarea
              v-model="content.message"
              name="message"
              id="message"
              cols="auto"
              rows="3"
              :class="`form-control w-100 ${ errors[0] ? 'is-invalid' : ''}`"
            ></textarea>
            <span v-if="errors" class="text-danger">{{ errors[0] }}</span>
          </div>
        </div>
      </ValidationProvider>
      <div class="form-group">
        <button
          v-if="loading == false"
          type="button"
          @click="send()"
          class="btn btn-primary text-uppercase"
        >Submit</button>
        <div v-else class="alert alert-light d-flex align-items-center mb-0 px-3" role="alert">
          <div class="spinner-border spinner-border-sm mr-2" role="status">
            <span class="sr-only">Loading...</span>
          </div>
          <span>Loading...</span>
        </div>
      </div>
    </form>
    <div v-else class="alert alert-success" role="alert">
      <h4 class="alert-heading">Thank you!</h4>
      <p>{{successMessage}}</p>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In, doloribus? Saepe autem magni, sed in, praesentium omnis magnam eos, ex molestiae ab doloribus a architecto? Atque, quasi numquam. Voluptatem, eveniet?</p>
      <hr />
      <p class="mb-0">Vendor email: {{product.user.email}}</p>
    </div>
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
  props: {
    product: Object,
    default: null
  },
  data() {
    return {
      submitted: false,
      successMessage: "",
      loading: false,
      content: {
        message: ""
      }
    };
  },
  methods: {
    send() {
      this.loading = true;
      let data = {
        content: JSON.stringify(this.content),
        to_id: this.product.user.id,
        product_details: JSON.stringify(this.product)
      };
      axios
        .post("/product/inquire", data)
        .then(response => {
          this.loading = false;
          this.submitted = true;
          this.successMessage = response.data.message;
        })
        .catch(error => {
          this.loading = false;
          console.log(error.response.data);
        });
    }
  }
};
</script>