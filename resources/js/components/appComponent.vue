<template>
    <v-app id="inspire">
        <v-navigation-drawer v-model="drawer" app clipped>
            <v-list>
                <v-list-item class="nav-link" to="/">
                    <v-list-item-action>
                        <v-icon small color="orange darken-2"
                            >fas fa-home</v-icon
                        >
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>Эхлэл</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item class="nav-link" to="/anime">
                    <v-list-item-action>
                        <v-icon small color="orange darken-2"
                            >fas fa-torii-gate</v-icon
                        >
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>Анимэ</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item disabled class="nav-link" to="/manga">
                    <v-list-item-action>
                        <v-icon small color="orange darken-2"
                            >fas fa-torah</v-icon
                        >
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>Манга</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item disabled class="nav-link" to="/novel">
                    <v-list-item-action>
                        <v-icon small color="orange darken-2"
                            >fas fa-book</v-icon
                        >
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>Эх Зохиол</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item class="nav-link" to="/song">
                    <v-list-item-action>
                        <v-icon small color="orange darken-2"
                            >fas fa-music</v-icon
                        >
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>Дуу</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item disabled class="nav-link" to="/shop">
                    <v-list-item-action>
                        <v-icon small color="orange darken-2"
                            >fas fa-shopping-cart</v-icon
                        >
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>Онлайн дэлгүүр</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-divider></v-divider>
                <v-list-group
                    color="orange darken-2"
                    prepend-icon="fas fa-user"
                    value="false"
                >
                    <template v-slot:activator>
                        <v-list-item-content>
                            <v-list-item-title>{{
                                currentUser.username
                            }}</v-list-item-title>
                        </v-list-item-content>
                    </template>
                    <v-list-item class="nav-link" to="/profile">
                        <v-list-item-action>
                            <v-icon small color="orange darken-2"
                                >fas fa-address-book</v-icon
                            >
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title
                                >Хувийн мэдээлэл</v-list-item-title
                            >
                        </v-list-item-content>
                    </v-list-item>
                    <v-list-item class="nav-link" to="/novel/edit">
                        <v-list-item-action>
                            <v-icon small color="orange darken-2"
                                >fas fa-plus</v-icon
                            >
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title>Зохиол нэмэх</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                    <v-list-item disabled class="nav-link" to="/mylist">
                        <v-list-item-action>
                            <v-icon small color="orange darken-2"
                                >fas fa-clipboard-list</v-icon
                            >
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title
                                >Зохиол Жагсаалт</v-list-item-title
                            >
                        </v-list-item-content>
                    </v-list-item>
                    <v-list-item class="nav-link" @click="logout">
                        <v-list-item-action>
                            <v-icon small color="orange darken-2"
                                >mdi-power</v-icon
                            >
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
                        <v-icon x-small color="orange darken-2"
                            >fab fa-android</v-icon
                        >
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title
                            >Android /Хандив өгөх/</v-list-item-title
                        >
                    </v-list-item-content>
                </v-list-item>
                <v-list-item disabled class="nav-link">
                    <v-list-item-action>
                        <v-icon x-small color="orange darken-2"
                            >fab fa-app-store-ios</v-icon
                        >
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>IOS /Хандив өгөх/</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item center class="nav-link">
                    <v-list-item-action>
                        <v-icon x-small color="orange darken-2"
                            >fas fa-moon</v-icon
                        >
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title
                            ><v-switch
                                v-model="switch1"
                                color="orange darken-2"
                            ></v-switch
                        ></v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>

        <v-app-bar app clipped-left>
            <v-app-bar-nav-icon @click.stop="drawer = !drawer" />
            <v-toolbar-title>
                <img
                    class="text-end"
                    style="height:35px"
                    src="/images/logo.png"
                />
            </v-toolbar-title>
            <v-spacer></v-spacer>
            <v-autocomplete
                @click="$vuetify.goTo(target, options)"
                v-model="model"
                :items="items"
                :loading="isLoading"
                :search-input.sync="search"
                hide-details
                hide-no-data
                hide-selected
                item-text="Description"
                item-value="API"
                return-object
                flat
                solo-inverted
                color="orange darken-2"
                prepend-inner-icon="fa fa-search"
                label="Хайлт..."
                class="hidden-sm-and-down"
            ></v-autocomplete>
            <v-spacer></v-spacer>
        </v-app-bar>

        <v-content class="border border-primary rounded">
            <v-container contain>
                <v-expand-transition>
                    <v-list v-if="model" class="dark">
                        <v-list-item v-for="(field, i) in fields" :key="i">
                            <v-list-item-content>
                                <v-list-item-title
                                    v-text="field.value"
                                ></v-list-item-title>
                                <v-list-item-subtitle
                                    v-text="field.key"
                                ></v-list-item-subtitle>
                            </v-list-item-content>
                        </v-list-item>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn
                                :disabled="!model"
                                color="grey darken-3"
                                @click="model = null"
                            >
                                Clear
                                <v-icon right>mdi-close-circle</v-icon>
                            </v-btn>
                        </v-card-actions>
                    </v-list>
                </v-expand-transition>

                <router-view></router-view>
            </v-container>
        </v-content>
        {{ (this.$vuetify.theme.dark = this.switch1) }}
        <v-footer app>
            <span>Хувилбар - v2.1.0</span>
        </v-footer>
    </v-app>
</template>

<script>
export default {
    props: {
        source: String
    },
    data: () => ({
        switch1: true,
        descriptionLimit: 60,
        entries: [],
        isLoading: false,
        model: null,
        search: null,
        currentUser: {
            username: "Нэвтрээгүй"
        },
        csrf: document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content"),
        drawer: null
    }),
    computed: {
        target() {
            //const value = this[this.type];
            //if (!isNaN(value)) return Number(value);
            //else
            return 0;
        },
        options() {
            return {
                duration: 300,
                offset: 0,
                easing: "easeInOutCubic"
            };
        },
        fields() {
            if (!this.model) return [];

            return Object.keys(this.model).map(key => {
                return {
                    key,
                    value: this.model[key] || "n/a"
                };
            });
        },
        items() {
            return this.entries.map(entry => {
                const Description =
                    entry.Description.length > this.descriptionLimit
                        ? entry.Description.slice(0, this.descriptionLimit) +
                          "..."
                        : entry.Description;

                return Object.assign({}, entry, { Description });
            });
        }
    },
    watch: {
        search(val) {
            // Items have already been loaded
            if (this.items.length > 0) return;

            // Items have already been requested
            if (this.isLoading) return;

            this.isLoading = true;

            // Lazily load input items
            fetch("https://api.publicapis.org/entries")
                .then(res => res.json())
                .then(res => {
                    const { count, entries } = res;
                    this.count = count;
                    this.entries = entries;
                })
                .catch(err => {
                    console.log(err);
                })
                .finally(() => (this.isLoading = false));
        }
    },
    mounted() {
        axios
            .get("/profile")
            .then(response => (this.currentUser = response.data));
    },
    methods: {
        logout() {
            axios.post("/logout", { _token: this.csrf });
            window.location.replace("/login");
        }
    },
    created() {
        this.$vuetify.theme.dark = this.switch1;
    }
};
</script>
