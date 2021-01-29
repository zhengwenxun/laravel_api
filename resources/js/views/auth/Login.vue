<template>
        <v-main>
            <v-container
                class="fill-height"
                fluid
            >
                <v-row
                    align="center"
                    justify="center"
                >
                    <v-col
                        cols="12"
                        sm="8"
                        md="4"
                    >
                        <v-card class="elevation-2">
                            <v-toolbar
                                color="primary"
                                dark
                                flat
                            >
                                <v-toolbar-title>用户登录</v-toolbar-title>
                                <v-spacer></v-spacer>
                                <router-link to="/register">
                                    <v-btn
                                        text
                                    >
                                        注册
                                    </v-btn>
                                </router-link>
                            </v-toolbar>
                            <v-card-text>
                                <v-form>
                                    <v-text-field
                                        v-model="email"
                                        label="邮箱"
                                        prepend-icon="mdi-email-outline"
                                        type="text"
                                    ></v-text-field>

                                    <v-text-field
                                        v-model="password"
                                        label="密码"
                                        prepend-icon="mdi-lock-outline"
                                        type="password"
                                    ></v-text-field>
                                    <v-btn color="primary " text @click="$router.push({ path: '/repassword' });">找回密码</v-btn>
                                </v-form>
                            </v-card-text>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn color="primary elevation-1" @click="to_login()">登录</v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>

            <!--消息-->
            <v-snackbar
                v-model="$store.state.auth_snackbar"
                :color="$store.state.auth_color"
                timeout="3000"
                top="top"
            >
                {{$store.state.auth_msg}}
                <template v-slot:action="{ attrs }">
                    <v-btn
                        dark
                        text
                        v-bind="attrs"
                        @click="snackbar = false"
                    >
                        关闭
                    </v-btn>
                </template>
            </v-snackbar>

        </v-main>
</template>
<script>

export default {
    name: 'Login',
    data: () => ({
        email:'',
        password:'',
        msg:''

    }),
    mounted(){
    },
    methods:{
        to_login(){
            
        }
    }
}
</script>