<template>
  <v-app id="inspire">
    <v-navigation-drawer v-model="drawer" app clipped>
      <v-list>
        <v-list-item class="nav-link" to="/">
          <v-list-item-action>
            <v-icon small color="orange darken-2">fas fa-home</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Эхлэл</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-list-item class="nav-link" to="/anime">
          <v-list-item-action>
            <v-icon small color="orange darken-2">fas fa-torii-gate</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Анимэ</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-list-item class="nav-link" to="/manga">
          <v-list-item-action>
            <v-icon small color="orange darken-2">fas fa-torah</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Зохиол</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-list-item class="nav-link" to="/contact">
          <v-list-item-action>
            <v-icon small color="orange darken-2">fas fa-music</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Дуу</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-list-item class="nav-link" target="_blank" href="https://ren.mn">
          <v-list-item-action>
            <v-icon small color="orange darken-2">fas fa-newspaper</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Ren.mn</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-divider></v-divider>
        <v-list-group color="orange darken-2" prepend-icon="fas fa-user" value="false">
          <template v-slot:activator>
            <v-list-item-content>
              <v-list-item-title>{{currentUser.username}}</v-list-item-title>
            </v-list-item-content>
          </template>
          <v-list-item class="nav-link" to="/profile">
            <v-list-item-action>
              <v-icon small color="orange darken-2">fas fa-address-book</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title>Хувийн мэдээлэл</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
          <v-list-item class="nav-link" to="/mylist">
            <v-list-item-action>
              <v-icon small color="orange darken-2">fas fa-clipboard-list</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title>Жагсаалт</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
          <v-list-item class="nav-link" @click="logout">
            <v-list-item-action>
              <v-icon small color="orange darken-2">mdi-power</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title>Гарах</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list-group>
        <v-divider></v-divider>
        <v-list-item class="nav-link">
          <v-list-item-content>
            <v-list-item-title>Тун удахгүй</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-list-item disabled small class="nav-link">
          <v-list-item-action>
            <v-icon x-small color="orange darken-2">fab fa-android</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Android</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-list-item disabled class="nav-link">
          <v-list-item-action>
            <v-icon x-small color="orange darken-2">fab fa-app-store-ios</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>IOS</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar app clipped-left>
      <v-app-bar-nav-icon @click.stop="drawer = !drawer" />
      <v-toolbar-title>
        <img class="text-end" style="height:35px" src="/images/logo.png" />
      </v-toolbar-title>
    </v-app-bar>

    <v-content class="border border-primary rounded">
      <v-container contain>
        <router-view></router-view>
      </v-container>
    </v-content>

    <v-footer app>
      <span>&copy; 2020 - v2.0.1</span>
    </v-footer>
  </v-app>
</template>

<script>
export default {
  props: {
    source: String
  },
  data: () => ({
    currentUser: {
      username: "Нэвтрээгүй"
    },
    csrf: document
      .querySelector('meta[name="csrf-token"]')
      .getAttribute("content"),
    drawer: null
  }),
  computed: {},
  mounted() {
    axios.get("/profile").then(response => (this.currentUser = response.data));
  },
  methods: {
    logout() {
      axios.post("/logout", { _token: this.csrf });
      window.location.replace("/login");
    }
  },
  created() {
    this.$vuetify.theme.dark = true;
  }
};
</script>
