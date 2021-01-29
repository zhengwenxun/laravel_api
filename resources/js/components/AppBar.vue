<template>
        <v-app-bar
            color="deep-purple accent-4"
            app
            dense
            dark
        >
            <v-app-bar-nav-icon></v-app-bar-nav-icon>

            <v-toolbar-title>应用栏</v-toolbar-title>
            <v-btn
                text
                dark
                to="/auth/login"
            >
                注册
            </v-btn>
            <v-btn
                text
                dark
                to="/auth/register"
            >
                登录
            </v-btn>
            <v-btn
                text
                dark
                to="/user"
            >
                用户中心
            </v-btn>

            <v-spacer></v-spacer>

            <v-btn icon>
                <v-icon>mdi-heart</v-icon>
            </v-btn>

            <v-btn icon>
                <v-icon>mdi-magnify</v-icon>
            </v-btn>
        </v-app-bar>

</template>
<script>
export default {
    name: 'AppBar',
    components:{
    },
    data: () => ({

    }),
    computed: {
    }
}
</script>