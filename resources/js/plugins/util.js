export default{
    install(Vue,options)
    {
        Vue.prototype.setLoading = function (type) {
            this.$store.state.loading_overlay=type
        }



    }
}