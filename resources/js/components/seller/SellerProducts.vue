<template>
  <div class="container">
    <card-navigation :user="user" />
    <div class="row">
      <div class="col-12">
        <div class="shadow-sm p-4 bg-white rounded">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <h4 class="text-uppercase mb-0">Products</h4>
            <router-link to="/seller/product/create" type="button" class="btn btn-sm btn-dark shadow-sm">New</router-link>
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
                  <img :src="baseUrl+'/'+product.featured_image" class="mb-0" width="30" />
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
          <nav aria-label="...">
            <ul class="pagination pagination-sm justify-content-center">
              <li class="page-item active" aria-current="page">
                <span class="page-link">
                  1
                  <span class="sr-only">(current)</span>
                </span>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">2</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">3</a>
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
      baseUrl: window.location.origin
    };
  },
  methods: {
    view() {
      console.log(i);
    },
    edit(i) {
      console.log(i);
    },
    remove(i) {
      console.log(i);
    },
    getProducts(p) {
      axios
        .get("/seller/get-products?page=" + p)
        .then(response => {
          this.products = response.data.products.data;
          console.log(typeof this.products);
        })
        .catch(error => {
          console.log("Error: " + error);
        });
    }
  },
  mounted() {
    this.getProducts(1);
  }
};
</script>