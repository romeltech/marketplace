<template>
  <div class="container">
    <card-navigation :user="user" />
    <div class="row">
      <div class="col-12">
        <div class="shadow-sm p-4 bg-white rounded">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <h4 class="text-uppercase mb-0">Products</h4>
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