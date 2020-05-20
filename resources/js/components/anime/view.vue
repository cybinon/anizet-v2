<template>
  <div class="anime mb-2">
    <v-row class="mb-6" no-gutters>
      <v-col :sm="6" :md="3">
        <v-img src="https://cdn.myanimelist.net/images/anime/1702/106229l.jpg"></v-img>
      </v-col>
      <v-col :sm="6" :md="3">
        <v-card class="mx-auto" tile>
          <v-list-item>
            <v-list-item-content>
              <v-list-item-title>Анимэ нэр</v-list-item-title>
              <v-list-item-subtitle>Бурхны цамхаг, Kami No Tou, 神之塔</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>

          <v-list-item two-line>
            <v-list-item-content>
              <v-list-item-title>Нийт Анги</v-list-item-title>
              <v-list-item-subtitle>13</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>

          <v-list-item two-line>
            <v-list-item-content>
              <v-list-item-title>Гарч байгаа</v-list-item-title>
              <v-list-item-subtitle>Нийт гарсан анги: 7</v-list-item-subtitle>
              <v-list-item-subtitle>Нийт гарах анги: 13</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>

          <v-list-item three-line>
            <v-list-item-content>
              <v-list-item-title>Товч агуулга</v-list-item-title>
              <v-list-item-subtitle v-text="text"></v-list-item-subtitle>
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
              <v-list-item-text class="text-center">
                <v-btn x-small color="primary" class="mb-1">Action</v-btn>
                <v-btn x-small color="primary" class="mb-1">Adventure</v-btn>
                <v-btn x-small color="primary" class="mb-1">Drama</v-btn>
                <v-btn x-small color="primary" class="mb-1">Fantasy</v-btn>
                <v-btn x-small color="primary" class="mb-1">Mystery</v-btn>
              </v-list-item-text>
            </v-list-item-content>
          </v-list-item>

          <v-list-item>
            <v-list-item-content></v-list-item-content>
          </v-list-item>
        </v-card>
      </v-col>
      <v-col :cols="12" :md="6" class="px-3" style="overflow:auto; height: 500px">
        <v-card class="mx-auto" tile>
          <v-list-item href="/#/player/10" v-for="n in 3" :key="n">
            <v-list-item-content>
              <v-list-item-title class="orange--text">Анги: 01</v-list-item-title>
              <v-list-item-subtitle v-text="text">lorem ipsum</v-list-item-subtitle>
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
    text:
      "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
  })
};
</script>
