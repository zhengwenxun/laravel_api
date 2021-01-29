<template>

    <v-app id="inspire">
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
                                <v-toolbar-title>修改密码</v-toolbar-title>
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
                                            <v-btn text @click="send_email()">
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
                                <v-btn @click="edit()" class="primary elevation-1">修改</v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>
        </v-main>

        <!--消息-->
        <v-snackbar
            v-model="snackbar"
            :color="color"
            timeout="3000"
            top="top"
        >
            {{msg}}
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

    </v-app>
</template>
<script>
// @ is an alias to /src
/*import HelloWorld from '@/components/HelloWorld.vue'*/


export default {
    name: 'Repassword',
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
        send_email(){
            this.$axios({
                method: 'post',
                url:'/send_email',
                data:{
                    'email':this.email,
                }
            })
                .then(response => {
                    this.snackbar=true
                    this.msg=response.msg
                    this.color=response.status

                })
                .catch(error => {
                    console.log(error)
                })
        },
        edit(){
            this.$axios({
                method: 'post',
                url:'/repassword',
                data:{
                    'code':this.code,
                    'email':this.email,
                    'password':this.password,
                    'password_confirmation':this.passwordconfirm,
                }
            })
                .then(response => {
                    this.snackbar=true
                    this.msg=response.msg
                    this.color=response.status
                    if(response.status=='success'){
                        this.login(this.email,this.password)
                    }

                })
                .catch(error => {
                    console.log(error)
                })
        }
    }
}
</script>