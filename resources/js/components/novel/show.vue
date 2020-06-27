<template>
  <v-container>
    <div class="bg-light text-dark rounded p-3" v-html = item.content>

    </div>
  </v-container>
</template>

<script>
export default {
   data() {
       return {
           item: {content: 'test'}
       }
   },
   mounted() {
       axios.get('/api/v1/novel/show/'+this.$route.params.id).then(res => (this.item = res.data))
   },
}
</script>

<style>

</style>
