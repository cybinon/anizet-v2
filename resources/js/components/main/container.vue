<template>
  <div>
    <div class="w-100 overflow-hidden rounded" style="max-height:60vh">
      <div v-if="true">
        <v-img
          src="https://wallpapermemory.com/uploads/744/gintama-background-full-hd-332151.jpg"
          gradient="to top right, rgba(17,17,17,1), rgba(25,32,72,.0)"
        >
          <v-card-title>Санал болгож байна</v-card-title>
        </v-img>
      </div>

      <!-- https://i.imgur.com/M7oecMS.jpg -->
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
