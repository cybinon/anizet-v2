<template>
  <div class="anime mb-2">
    <v-row class="mb-6" no-gutters>
      <v-col :sm="6" :md="3">
        <v-img :src="infos.image_height"></v-img>
      </v-col>
      <v-col :sm="6" :md="3">
        <v-card class="mx-auto" tile>
          <v-list-item>
            <v-list-item-content>
              <v-list-item-title>Анимэ нэр</v-list-item-title>
              <v-list-item-subtitle>{{infos.anime.caption_mn}}, {{infos.anime.caption_en}}, {{infos.anime.caption_kanji}}</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>

          <v-list-item>
            <v-list-item-content>
              <v-list-item-title>Бүлэг</v-list-item-title>
              <v-list-item-subtitle>{{infos.name}}</v-list-item-subtitle>
              <v-list-item-subtitle>{{infos.number}}</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>

          <v-list-item two-line>
            <v-list-item-content>
              <v-list-item-title>Гарч байгаа</v-list-item-title>
              <v-list-item-subtitle>Нийт гарсан анги: {{infos.videos.lenght}}</v-list-item-subtitle>
              <v-list-item-subtitle>Нийт гарах анги: {{infos.episodes}}</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>

          <v-list-item three-line>
            <v-list-item-content>
              <v-list-item-title>Товч агуулга</v-list-item-title>
              <v-list-item-subtitle v-text="infos.description"></v-list-item-subtitle>
              <v-list-item-subtitle class="text-warning text-end">
                <v-btn text small color="orange">
                  Дэлгэрэнгүй
                  <i class="fas fa-arrow-right"></i>
                </v-btn>
              </v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>

          <v-list-item>
            <v-list-item-content>
              <p class="text-center">{{infos.anime.category}}</p>
            </v-list-item-content>
          </v-list-item>

          <v-list-item>
            <v-list-item-content></v-list-item-content>
          </v-list-item>
        </v-card>
      </v-col>
      <v-col :cols="12" :md="6" class="px-3" style="overflow:auto; height: 500px">
        <v-card class="mx-auto" tile v-for="item in infos.videos" :key="item.id">
          <v-list-item :href="'/#/player/'+item.id">
            <v-list-item-content>
              <v-list-item-title class="orange--text">Анги: {{item.episode_number}}</v-list-item-title>
              <v-list-item-subtitle v-text="item.episode_caption">lorem ipsum</v-list-item-subtitle>
              <v-divider></v-divider>
            </v-list-item-content>
          </v-list-item>
        </v-card>
      </v-col>
    </v-row>
  </div>
</template>
<script>
export default {
  data: () => ({
    infos: null
  }),

  mounted() {
    axios
      .get("/api/v1/anime/select/" + this.$route.params.id)
      .then(response => (this.infos = response.data));
  }
};
</script>
