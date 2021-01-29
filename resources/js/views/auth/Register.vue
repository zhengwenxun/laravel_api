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
                                <v-toolbar-title>用户注册</v-toolbar-title>
                                <v-spacer></v-spacer>
                                <router-link to="/login">
                                    <v-btn
                                        text
                                    >
                                        登录
                                    </v-btn>
                                </router-link>
                            </v-toolbar>
                            <v-card-text>
                                <v-form>
                                    <v-text-field
                                        label="昵称"
                                        v-model="name"
                                        prepend-icon="mdi-account-circle-outline"
                                        type="text"
                                    ></v-text-field>
                                    <v-text-field
                                        label="邮箱"
                                        v-model="email"
                                        prepend-icon="mdi-email-outline"
                                        type="text"
                                    ></v-text-field>
                                    <v-text-field
                                        clearable
                                        label="验证码"
                                        v-model="code"
                                        prepend-icon="mdi-numeric"
                                        type="text"
                                    >
                                        <template v-slot:append-outer>
                                            <v-btn text @click="">
                                                <v-icon left>mdi-email-send-outline</v-icon>
                                                发送验证码
                                            </v-btn>
                                        </template>
                                    </v-text-field>

                                    <v-text-field
                                        id="password"
                                        label="密码"
                                        v-model="password"
                                        prepend-icon="mdi-lock-outline"
                                        type="password"
                                    ></v-text-field>

                                    <v-text-field
                                        id="repassword"
                                        label="确认密码"
                                        v-model="passwordconfirm"
                                        prepend-icon="mdi-lock-check-outline"
                                        type="password"
                                    ></v-text-field>
                                </v-form>
                            </v-card-text>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn @click="register()" class="primary elevation-1">注册</v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>

        </v-main>
</template>
<script>

export default {
    name: 'Register',
    data: () => ({
        snackbar:false,
        color:'',
        name:'',
        email:'',
        password:'',
        passwordconfirm:'',
        code:''


    }),
    mounted(){
    },
    methods:{
        register(){
            this.$axios({
                method: 'post',
                url:'/register',
                data:{
                    'code':this.code,
                    'email':this.email,
                    'name':this.name,
                    'password':this.password,
                    'password_confirmation':this.passwordconfirm,
                }
            })
                .then(response => {


                })
                .catch(error => {
                    console.log(error)
                })
        }
    }
}
</script>