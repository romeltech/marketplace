<template>
  <div class="col-12 pb-3">
    <form>
      <div class="shadow-sm bg-white rounded">
        <div class="d-flex align-items-center justify-content-between pt-3 px-3 pb-0">
          <h4>Create Product</h4>
          <div>
            <button type="button" class="btn btn-light ml-2" @click="save('draft')">Save as Draft</button>
            <button type="button" class="btn btn-primary ml-2" @click="save('publish')">Publish</button>
          </div>
        </div>
        <hr />
        <div class="col-md-8 pb-3">
          <div class="form-group">
            <label for="title">Title</label>
            <ValidationProvider rules="required|alpha_spaces|min:3|max:250" mode="eager">
              <div slot-scope="{ errors }">
                <input
                  v-model="title"
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
                  v-model="description"
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
      title: "",
      description: ""
    };
  },
  props: {
    user: Object,
    default: null
  },
  methods: {
    save(action) {
      let data = {
        title: this.title,
        description: this.description,
        status: action === "publish" ? 1 : 0
      };
      axios
        .post("/product/store", data)
        .then(response => {
          console.log(response);
        })
        .catch(error => {
          console.log(error.response);
        });
    }
  },
  mounted() {}
};
</script>

<style>
</style>