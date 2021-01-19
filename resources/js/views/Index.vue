<template>
  <v-app>
    <v-app-bar app></v-app-bar>
    <v-main>
      <v-container>
        <router-link to="/user">Go to USER</router-link>
        Hello World
        <router-view/>
      </v-container>
    </v-main>
  </v-app>
</template>
<script>

export default {
    name: 'Index',
    components:{
    },
    data: () => ({

    }),
    computed: {
    }
}
</script>