<template>
  <div>
    <v-alert
      class="h1 pl-6 mt-5 bg-transparent"
      border="left"
      colored-border
      color="orange"
      elevation="2"
    >Шинэ гаралт</v-alert>
    <carousel
      class="mt-3"
      :margin="20"
      :autoplay="false"
      :nav="false"
      :responsive="{
                    0: { items: 2 },
                    600: { items: 3 },
                    1200: { items: 5 }
                }"
    >
      <v-card max-width="100%">
        <v-img
          class="white--text align-end"
          height="200px"
          gradient="to top right, rgba(17,17,17,1), rgba(25,32,72,.0)"
          src="https://weebrevueshome.files.wordpress.com/2020/03/gleipnir-1-banner.png?w=1024"
        >
          <v-card-title>Anime Gleipnir</v-card-title>
        </v-img>
      </v-card>
      <v-card max-width="100%">
        <v-img
          class="white--text align-end"
          height="200px"
          gradient="to top right, rgba(17,17,17,1), rgba(25,32,72,.0)"
          src="https://upload.wikimedia.org/wikipedia/en/thumb/7/7d/Tower_of_God_Volume_1_Cover.jpg/220px-Tower_of_God_Volume_1_Cover.jpg"
        >
          <v-card-title>Anime Tower Of God</v-card-title>
        </v-img>
      </v-card>
      <v-card max-width="100%">
        <v-img
          class="white--text align-end"
          height="200px"
          gradient="to top right, rgba(17,17,17,1), rgba(25,32,72,.0)"
          src="https://cdn.myanimelist.net/images/anime/1986/105547l.jpg"
        >
          <v-card-title>Anime Yesterday Wo Utatte</v-card-title>
        </v-img>
      </v-card>
    </carousel>
  </div>
</template>
<script>
import carousel from "vue-owl-carousel";

export default {
  components: { carousel }
};
</script>
