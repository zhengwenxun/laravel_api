<template>
    <v-app>
        <AppBar/>
        <router-view/>
    </v-app>
</template>
<script>
import AppBar from '@/components/AppBar.vue'
export default {
    name: 'Index',
    components:{
        AppBar
    },
    data: () => ({

    }),
    computed: {
    }
}
</script>