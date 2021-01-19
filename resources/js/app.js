import Vue from 'vue'
import axios from '@/axios'
import util from './plugins/util'
import router from '@/router'
import store from '@/vuex/store'
import App from '@/App.vue';
import * as custom from '@/plugins/filter'//引入时间转换
Object.keys(custom).forEach(key => { Vue.filter(key, custom[key])})
Vue.use(util);
Vue.prototype.$axios = axios;



const app = new Vue({
    el: '#app',
    vuetify: new Vuetify({}),
    router,
    components: { App },
    store,
});
