<template>
  <div>
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <!-- active -->
            <!-- :class="`nav-link pointer ${active}`" -->
            <a class="nav-link pointer" @click="goTo('dashboard')">
              <i class="mdi mdi-home-variant-outline mr-1"></i>
              Dashboard
            </a>
          </li>
          <li class="nav-item" v-if="userRole == 'seller'">
            <a class="nav-link pointer" @click="goTo('products')">
              <i class="mdi mdi-email-outline mr-1"></i>
              Products
            </a>
          </li>
          <li class="nav-item" v-if="userRole == 'admin'">
            <a class="nav-link pointer" @click="goTo('messages')">
              <i class="mdi mdi-email-outline mr-1"></i>
              Messages
            </a>
          </li>
          <li class="nav-item" v-if="userRole == 'buyer'">
            <a class="nav-link pointer" @click="goTo('inquiries')">
              <i class="mdi mdi-email-outline mr-1"></i>
              Inquiries
            </a>
          </li>
          <li class="nav-item" v-if="userRole == 'seller'">
            <a class="nav-link pointer" @click="goTo('leads')">
              <i class="mdi mdi-email-outline mr-1"></i>
              Leads
            </a>
          </li>
          <li class="nav-item" v-if="userRole == 'seller' || userRole == 'buyer'">
            <a class="nav-link pointer" @click="goTo('orders')">
              <i class="mdi mdi-email-outline mr-1"></i>
              Orders
            </a>
          </li>
        </ul>
        <div v-if="userRole == 'super'">
          <h6
            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"
          >
            <span>Super Admin</span>
            <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="feather feather-plus-circle"
              >
                <circle cx="12" cy="12" r="10" />
                <line x1="12" y1="8" x2="12" y2="16" />
                <line x1="8" y1="12" x2="16" y2="12" />
              </svg>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="feather feather-file-text"
                >
                  <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                  <polyline points="14 2 14 8 20 8" />
                  <line x1="16" y1="13" x2="8" y2="13" />
                  <line x1="16" y1="17" x2="8" y2="17" />
                  <polyline points="10 9 9 9 8 9" />
                </svg>
                Current month
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="feather feather-file-text"
                >
                  <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                  <polyline points="14 2 14 8 20 8" />
                  <line x1="16" y1="13" x2="8" y2="13" />
                  <line x1="16" y1="17" x2="8" y2="17" />
                  <polyline points="10 9 9 9 8 9" />
                </svg>
                Last quarter
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="feather feather-file-text"
                >
                  <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                  <polyline points="14 2 14 8 20 8" />
                  <line x1="16" y1="13" x2="8" y2="13" />
                  <line x1="16" y1="17" x2="8" y2="17" />
                  <polyline points="10 9 9 9 8 9" />
                </svg>
                Social engagement
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="feather feather-file-text"
                >
                  <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                  <polyline points="14 2 14 8 20 8" />
                  <line x1="16" y1="13" x2="8" y2="13" />
                  <line x1="16" y1="17" x2="8" y2="17" />
                  <polyline points="10 9 9 9 8 9" />
                </svg>
                Year-end sale
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  props: ["userRole"],
  data() {
    return {
      active: false
    };
  },
  methods: {
    goTo(r) {
      this.$router
        .push({ path: "/" + this.userRole + "/" + r })
        .catch(err => {});
    }
  }
};
</script>