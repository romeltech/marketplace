<template>
  <div>
    <ValidationObserver ref="observer" v-slot="{ invalid }" @submit.prevent="sendMessage">
      <form>
        <div class="form-row">
          <div class="form-group col-md-6">
            <ValidationProvider rules="required|max:150" mode="eager">
              <div slot-scope="{ errors }">
                <label for="fullname">Full Name</label>
                <input
                  type="text"
                  v-model="msg.full_name"
                  :class="`form-control w-100 ${ errors[0] ? 'is-invalid' : ''}`"
                  id="fullname"
                />
                <small v-if="errors" class="text-danger">{{ errors[0] }}</small>
              </div>
            </ValidationProvider>
          </div>
          <div class="form-group col-md-6">
            <ValidationProvider rules="required|email" mode="eager">
              <div slot-scope="{ errors }">
                <label for="email">Email</label>
                <input
                  type="email"
                  v-model="msg.email"
                  :class="`form-control ${ errors[0] ? 'is-invalid' : ''}`"
                  id="email"
                />
                <small v-if="errors" class="text-danger">{{ errors[0] }}</small>
              </div>
            </ValidationProvider>
          </div>
        </div>
        <div class="form-group">
          <ValidationProvider
            :rules="{ required: { allowFalse: false } , min: 10, max: 20, regex:/^[\+0][0-9]+$/ }"
            mode="eager"
          >
            <div slot-scope="{ errors }">
              <label for="phone">Phone Number</label>
              <input
                type="text"
                v-model="msg.phone"
                :class="`form-control ${ errors[0] ? 'is-invalid' : ''}`"
                id="phone"
                placeholder="+971501234567"
              />
              <small v-if="errors" class="text-danger">{{ errors[0] }}</small>
            </div>
          </ValidationProvider>
        </div>
        <div class="form-group">
          <ValidationProvider rules="required" mode="eager">
            <div slot-scope="{ errors }">
              <label for="subject">Subject</label>
              <input
                type="text"
                v-model="msg.subject"
                :class="`form-control ${ errors[0] ? 'is-invalid' : ''}`"
                id="subject"
              />
              <small v-if="errors" class="text-danger">{{ errors[0] }}</small>
            </div>
          </ValidationProvider>
        </div>
        <div class="form-group">
          <ValidationProvider rules="required|max:2000" mode="eager">
            <div slot-scope="{ errors }">
              <label for="message">Message</label>
              <textarea
                v-model="msg.message"
                :class="`form-control ${ errors[0] ? 'is-invalid' : ''}`"
                id="message"
                rows="3"
              ></textarea>
              <small v-if="errors" class="text-danger">{{ errors[0] }}</small>
            </div>
          </ValidationProvider>
        </div>
        <button
          @click="sendMessage"
          class="btn btn-primary"
          type="button"
          :disabled="invalid || loading == true"
        >
          <span v-if="loading == true" class="spinner-border spinner-border-sm mr-1"></span>
          <span v-html="loading == true ? 'Loading...' : 'Submit'"></span>
        </button>
      </form>
    </ValidationObserver>
    <Alert :status="alertData.status" :message="alertData.message" :type="alertData.type" />
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
      loading: false,
      msg: {
        full_name: "",
        email: "",
        phone: "",
        subject: "",
        message: ""
      },
      alertData: {
        status: null,
        type: "",
        message: ""
      }
    };
  },
  methods: {
    clearAlert() {
      this.alertData.message = "";
      this.alertData.type = "";
      this.alertData.status = null;
    },
    alertUI(m = "", t = "", s = false) {
      this.alertData.message = m;
      this.alertData.type = t;
      this.alertData.status = s;
      setTimeout(() => {
        this.clearAlert();
      }, 10000);
    },
    sendMessage() {
      this.loading = true;
      axios
        .post("/message/send", this.msg)
        .then(response => {
          this.loading = false;
          this.msg = Object.assign({});
          requestAnimationFrame(() => {
            this.$refs.observer.reset();
          });
          this.alertUI(response.data.message, "success", true);
        })
        .catch(error => {
          this.loading = false;
          this.alertUI(error.response.statusText + ". Please try again later.", "danger", true);
        });
    }
  }
};
</script>