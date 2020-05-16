<template>
  <div>
    <v-alert
      class="h1 pl-6 mt-5 bg-transparent"
      border="left"
      colored-border
      color="orange"
      elevation="2"
    >Гарч дууссан</v-alert>
    <div v-swiper:mySwiper="swiperOption">
      <div class="swiper-wrapper">
        <div class="swiper-slide" :key="item.id" v-for="item in info">
          <v-card to="player" max-width="100%">
            <v-img
              class="white--text align-end"
              height="200px"
              gradient="to top right, rgba(17,17,17,1), rgba(25,32,72,.0)"
              v-bind:src="item.image_width"
            >
              <v-card-title>{{ item.anime.caption_mn }}</v-card-title>
            </v-img>
          </v-card>
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
</template>
<script>
import VueAwesomeSwiper from "vue-awesome-swiper";
import "swiper/css/swiper.css";
import { Swiper, SwiperSlide, directive } from "vue-awesome-swiper";

export default {
  data() {
    return {
      info: null,
      swiperOption: {
        slidesPerView: 5,
        spaceBetween: 30,

        pagination: {
          el: ".swiper-pagination",
          clickable: true
        },
        breakpoints: {
          1024: {
            slidesPerView: 5,
            spaceBetween: 40
          },
          768: {
            slidesPerView: 4,
            spaceBetween: 30
          },
          640: {
            slidesPerView: 2,
            spaceBetween: 20
          },
          320: {
            slidesPerView: 2,
            spaceBetween: 10
          },
          100: {
            slidesPerView: 1,
            spaceBetween: 5
          }
        }
      }
    };
  },
  mounted() {
    console.log("Current Swiper instance object", this.mySwiper);
    this.mySwiper.slideTo(3, 2000, false);

    axios
      .get("/api/v1/anime/all")
      .then(response => (this.info = response.data));
  },
  components: {
    Swiper,
    SwiperSlide
  },
  directives: {
    swiper: directive
  }
};
</script>
