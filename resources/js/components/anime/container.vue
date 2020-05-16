<template>
  <div>
    <div class="user">
      <router-view></router-view>
    </div>
    <v-sheet class="mx-auto" elevation="8" max-width="100%">
      <v-slide-group v-model="model" class="pa-4" show-arrows>
        <v-slide-item v-slot:default="{ active, toggle }">
          <v-card
            :color="active ? 'primary' : 'grey lighten-1'"
            class="ma-4"
            height="200"
            width="350"
            @click="toggle"
          >
            <v-img
              class="white--text align-end"
              height="200px"
              gradient="to top right, rgba(17,17,17,1), rgba(25,32,72,.0)"
              src="https://cdn.myanimelist.net/images/anime/1589/106391l.jpg"
            >
              <v-card-title class="text-warning">Даваа</v-card-title>
            </v-img>

            <v-row class="fill-height" align="center" justify="center">
              <v-scale-transition>
                <v-icon v-if="active" color="white" size="48" v-text="'mdi-close-circle-outline'"></v-icon>
              </v-scale-transition>
            </v-row>
          </v-card>
        </v-slide-item>
        <v-slide-item v-slot:default="{ active, toggle }">
          <v-card
            :color="active ? 'primary' : 'grey lighten-1'"
            class="ma-4"
            height="200"
            width="350"
            @click="toggle"
          >
            <v-img
              class="white--text align-end"
              height="200px"
              gradient="to top right, rgba(17,17,17,1), rgba(25,32,72,.0)"
              src="https://cdn.myanimelist.net/images/anime/1986/105547l.jpg"
            >
              <v-card-title class="text-warning">Мягмар</v-card-title>
            </v-img>

            <v-row class="fill-height" align="center" justify="center">
              <v-scale-transition>
                <v-icon v-if="active" color="white" size="48" v-text="'mdi-close-circle-outline'"></v-icon>
              </v-scale-transition>
            </v-row>
          </v-card>
        </v-slide-item>
        <v-slide-item v-slot:default="{ active, toggle }">
          <v-card
            :color="active ? 'primary' : 'grey lighten-1'"
            class="ma-4"
            height="200"
            width="350"
            @click="toggle"
          >
            <v-img
              class="white--text align-end"
              height="200px"
              gradient="to top right, rgba(17,17,17,1), rgba(25,32,72,.0)"
              src="https://cdn.myanimelist.net/images/manga/2/227593l.jpg"
            >
              <v-card-title class="text-warning">Лхагва</v-card-title>
            </v-img>

            <v-row class="fill-height" align="center" justify="center">
              <v-scale-transition>
                <v-icon v-if="active" color="white" size="48" v-text="'mdi-close-circle-outline'"></v-icon>
              </v-scale-transition>
            </v-row>
          </v-card>
        </v-slide-item>
        <v-slide-item v-slot:default="{ active, toggle }">
          <v-card
            :color="active ? 'primary' : 'grey lighten-1'"
            class="ma-4"
            height="200"
            width="350"
            @click="toggle"
          >
            <v-img
              class="white--text align-end"
              height="200px"
              gradient="to top right, rgba(17,17,17,1), rgba(25,32,72,.0)"
              src="https://cdn.myanimelist.net/images/anime/1353/101943l.jpg"
            >
              <v-card-title class="text-warning">Пүрэв</v-card-title>
            </v-img>

            <v-row class="fill-height" align="center" justify="center">
              <v-scale-transition>
                <v-icon v-if="active" color="white" size="48" v-text="'mdi-close-circle-outline'"></v-icon>
              </v-scale-transition>
            </v-row>
          </v-card>
        </v-slide-item>
        <v-slide-item v-slot:default="{ active, toggle }">
          <v-card
            :color="active ? 'primary' : 'grey lighten-1'"
            class="ma-4"
            height="200"
            width="350"
            @click="toggle"
          >
            <v-img
              class="white--text align-end"
              height="200px"
              gradient="to top right, rgba(17,17,17,1), rgba(25,32,72,.0)"
              src="https://cdn.myanimelist.net/images/anime/1986/105547l.jpg"
            >
              <v-card-title class="text-warning">Баасан</v-card-title>
            </v-img>

            <v-row class="fill-height" align="center" justify="center">
              <v-scale-transition>
                <v-icon v-if="active" color="white" size="48" v-text="'mdi-close-circle-outline'"></v-icon>
              </v-scale-transition>
            </v-row>
          </v-card>
        </v-slide-item>
      </v-slide-group>

      <v-expand-transition>
        <v-sheet v-if="model != null" color="grey lighten-4" height="480" tile>
          <v-row class="fill-height" align="center" justify="center">
            <v-col cols="9">
              <h3 class="title">Анимэ дэлгэрэнгүй: {{ model }}</h3>
              <iframe
                class="w-100"
                height="300"
                src="https://www.youtube.com/embed/abqR66AVHS8"
                frameborder="0"
              ></iframe>
            </v-col>
          </v-row>
        </v-sheet>
      </v-expand-transition>
    </v-sheet>
    <div class="container">
      <list1></list1>
    </div>
  </div>
</template>

<script>
import carousel from "vue-owl-carousel";
import list1 from "../main/list1";
export default {
  components: {
    carousel,
    list1
  },
  data: () => ({
    model: null
  })
};
</script>
