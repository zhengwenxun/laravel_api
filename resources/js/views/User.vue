<template>
    <v-app id="inspire">
        <v-main>
            <v-container>
                user
            </v-container>
        </v-main>

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

    </v-app>
</template>
<script>

export default {
  name: 'User',
  components:{
  },
  data: () => ({

  }),
  computed: {
  }
}
</script>