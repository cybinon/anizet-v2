<template>
  <div>
    <div class="user">
      <router-view></router-view>
    </div>
{{info}}
    <div class="container">
      <v-row>
          <v-col :key="item.id" v-for="item in info">
               <v-card :to="'/view/'+item.id" max-width="100%" max-height="200px">
            <v-img
              class="white--text align-end"
              height="200px"
              gradient="to top right, rgba(17,17,17,1), rgba(25,32,72,.0)"
              v-bind:src="item.image_width"
            >
              <v-card-title>
                {{
                item.anime.caption_mn
                }}
              </v-card-title>
            </v-img>
          </v-card>
          </v-col>
      </v-row>
    </div>
  </div>
</template>

<script>
import list1 from "../main/list1";
export default {
  components: {
    list1
  },
  data: () => ({
    info: null,
    model: null
  }),
  mounted() {
      axios.get("/api/v1/anime/all").then(response => (this.info = response.data));
  }
};
</script>
