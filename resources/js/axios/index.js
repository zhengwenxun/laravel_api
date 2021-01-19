import axios from 'axios';
//axios.defaults.baseURL = ''; // 请求的默认域名
//axios.defaults.baseURL = ''; // 请求的默认域名

// 添加一个请求拦截器
axios.interceptors.request.use(config => {
        if(localStorage.getItem('token')!=null){
            config.headers['Authorization'] = 'Bearer ' + localStorage.getItem('token')
        }
        //添加域名web
        config.headers['web'] = document.URL
        //config.headers.languagetype = 'CN'; // 举例，加上一个公共头部
        return config;
    },
    err => {
        return Promise.reject(err);
    });
//添加一个响应拦截器
axios.interceptors.response.use(res => {
    //在这里对返回的数据进行处理
    /*console.log(res.data, '通信正常');*/

    return res.data;
}, err => {
    console.log('通信失败！请重试...');
    return Promise.reject(err);
})

export default axios

