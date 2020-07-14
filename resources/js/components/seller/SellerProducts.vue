<template>
  <div class="row">
    <side-navigation :user-role="userRole"></side-navigation>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-5">
      <div class="pt-5 mb-3">
        <h1 class="h4">Products</h1>
      </div>
      <div class="my-3 p-3 bg-white rounded shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-2">
          <h6 class="pb-2 mb-0">Recent updates</h6>
          <router-link
            to="/seller/product/create"
            type="button"
            class="btn btn-sm btn-dark shadow-sm"
          >New</router-link>
        </div>
        <table class="table table-striped border-bottom">
          <thead>
            <tr>
              <th scope="col" class="text-uppercase">ID</th>
              <th scope="col" class="text-uppercase">Image</th>
              <th scope="col" class="text-uppercase">Title</th>
              <th scope="col" style="text-align:right" class="text-uppercase">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="product in products" :key="product.id">
              <th width="1%" scope="row">{{ product.id }}</th>
              <td width="40px">
                <img
                  :src="product.featured_image ? baseUrl+'/'+product.featured_image : baseUrl+'/img/placeholder-img.jpg'"
                  class="mb-0"
                  width="30"
                />
              </td>
              <td>{{ product.title }}</td>
              <td width="20%" style="text-align:right">
                <i class="mdi mdi-eye pointer ml-1" @click="view(product.id)"></i>
                <i class="mdi mdi-pencil pointer ml-1" @click="edit(product.id)"></i>
                <i class="mdi mdi-trash-can-outline pointer ml-1" @click="remove(product.id)"></i>
              </td>
            </tr>
          </tbody>
        </table>
        <nav>
          <ul class="pagination justify-content-center">
            <li class="page-item" v-if="page.prev_page_url != null">
              <a
                class="page-link"
                href="javascript:void(0)"
                @click="changePage(page.current_page - 1)"
                aria-label="Previous"
              >
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <li
              v-for="index in page.last_page"
              :key="index"
              :class="`page-item ${ index == page.current_page ? 'active' : ''}`"
            >
              <a class="page-link" href="javascript:void(0)" @click="changePage(index)">{{index}}</a>
            </li>
            <li class="page-item" v-if="page.next_page_url != null">
              <a
                class="page-link"
                href="javascript:void(0)"
                @click="changePage(page.current_page + 1)"
                aria-label="Next"
              >
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </main>
  </div>
</template>
<script>
export default {
  props: {
    user: {
      type: Object,
      default: null
    },
    userRole: {
      type: String,
      default: null
    }
  },
  data() {
    return {
      // Products
      products: [],
      baseUrl: window.location.origin,

      // pagination
      page: []
    };
  },
  methods: {
    view(i) {
      console.log(i);
    },
    edit(i) {
      this.$router.push({ path: `/seller/product/edit/${i}` }).catch(err => {});
    },
    remove(i) {
      console.log(i);
    },
    getProducts(p) {
      axios
        .get("/seller/get-products?page=" + p)
        .then(response => {
          this.products = Object.assign({}, response.data.products.data);
          this.page = Object.assign({}, response.data.products, {
            data: undefined
          });
        })
        .catch(error => {
          console.log("Error: " + error);
        });
    },
    changePage(i) {
      if (i == 0) {
        return;
      }
      this.$router.push({ path: `/seller/products/${i}` }).catch(err => {});
    }
  },
  watch: {
    $route(to, from) {
      this.getProducts(this.$route.params.page);
    }
  },
  created() {
    if (this.$route.params.page) {
      this.getProducts(this.$route.params.page);
    } else {
      this.getProducts(1);
    }
  },
  mounted() {}
};
</script>