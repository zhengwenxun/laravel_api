import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const originalPush = VueRouter.prototype.push
VueRouter.prototype.push = function push(location) {
    return originalPush.call(this, location).catch(err => err)
}

const routes = [

    {
        path: '/',
        name: '',
        component: () => import('@/views/Index.vue'),
        children:[
            {
                path:'user',
                name: 'user',
                component: () => import('@/views/User.vue')
            },
            {
                path:'auth/login',
                name: 'login',
                component: () => import('@/views/auth/Login.vue')
            },
            {
                path:'auth/register',
                name: 'register',
                component: () => import('@/views/auth/Register.vue')
            }

        ]
    },
]

const router = new VueRouter({
    mode:'history',
    routes
})

// 路由守卫
router.beforeEach((to,from,next)=>{
    // to要跳转到的路径
    // from从哪个路径来
    // next往下执行的回调
    // 在localStorage中获取token
    next()
})
export default router
