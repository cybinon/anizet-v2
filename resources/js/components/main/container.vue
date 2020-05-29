<template>
  <div>
    <div class="w-100 overflow-hidden rounded" style="max-height:60vh">
      <div v-if="true">
        <v-img
          src="https://i2.wp.com/recommendmeanime.com/wp-content/uploads/2020/04/tower-of-god-anime.jpg?fit=1600%2C900&ssl=1"
          gradient="to right, rgba(17,17,17,1), rgba(245,124,0,0.1)"
        >
          <v-row justify="start">
            <v-col cols="6">
              <a class="nav-link" href="/#/view/10">
                <h1 class="text-white">Санал болгож байна</h1>
                <img
                  class="banner_logo"
                  src="https://upload.wikimedia.org/wikipedia/commons/1/1f/Tower_of_God_-_Logo_Anime.png"
                  alt
                />
              </a>
            </v-col>
          </v-row>
        </v-img>
      </div>

      <video v-else muted class="w-100" src="/introvid.mp4"></video>
    </div>
    <lists>Anime</lists>
  </div>
</template>
<script>
import lists from "./lists";
export default {
  components: {
    lists
  }
};
</script>
<style>
.banner_logo {
  width: 100%;
}
</style>
