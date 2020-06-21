class axioshelper {
    // constructor(errors = {}) {
    //   this.setErrors(errors);
    // }
    getData(route, id) {
        axios
            .get(route + id)
            .then(response => {
                console.log(response);
                return {
                    o: response.data,
                    status: success
                };
            })
            .catch(error => {});
    }

    postData() {
        console.log("Post data");
    }

    deleteData() {
        console.log("Delete Data");
    }
}
export default axioshelper;
