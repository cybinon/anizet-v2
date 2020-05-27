<template>
  <v-container>
    <div class="row">
      <div class="col">
        <div class="text-center h4">Анги: {{ info.episode_number }} {{ info.episode_caption }}</div>
      </div>
    </div>
    <video-player
      class="video-player-box vjs-theme-forest mx-auto"
      ref="videoPlayer"
      @statechanged="playerStateChanged($event)"
      @waiting="onPlayerWaiting($event)"
      @ready="playerReadied"
      @ended="onPlayerEnded($event)"
      :options="playerOptions"
      :playsinline="false"
    ></video-player>

    <div v-if="show == true" class="row skipper mx-auto">
      <div class="col">
        <div class="text-center h4">Opening : {{ info.duration_opening }} сек</div>
      </div>
      <div class="col">
        <v-btn v-on:click="updatetime()" class="w-100" color="orange" medium>Алгасах</v-btn>
      </div>
    </div>
    <div v-if="shownext == true" class="row skipper mx-auto">
      <div class="col">
        <div class="text-center h4">Ending : {{ info.duration_ending }} сек</div>
      </div>
      <div class="col">
        <v-btn v-on:click="endskip()" class="w-100" color="orange" medium>Алгасах</v-btn>
      </div>
    </div>
  </v-container>
</template>

<script>
import VueVideoPlayer from "vue-video-player";
import "videojs-contrib-hls";

import { videoPlayer } from "vue-video-player";

export default {
  components: {
    videoPlayer
  },

  data() {
    axios.get("/api/v1/anime/video/" + this.$route.params.id).then(
      response =>
        (this.playerOptions.sources = {
          type: "video/mp4",
          src: response.data.files.zet_720
        })
    );
    return {
      info: {
        caption_mn: "none"
      },
      duration: 0,
      show: false,
      shownext: false,

      playerOptions: {
        // videojs options
        muted: false,
        loop: false,

        controls: true,
        preload: "auto",

        poster:
          "https://wallpapermemory.com/uploads/744/gintama-background-full-hd-332151.jpg"
      }
    };
  },
  mounted() {
    if (process.browser) {
      const VueVideoPlayer = require("vue-video-player/dist/ssr");
      Vue.use(VueVideoPlayer);
    }

    axios
      .get("/api/v1/anime/video/" + this.$route.params.id)
      .then(response => (this.info = response.data));
  },
  computed: {
    player() {
      return this.$refs.videoPlayer.player;
    }
  },
  methods: {
    // listen event
    onPlayerEnded(playerEnded) {
      if (
        this.info.next_episode != null &&
        this.info.next_episode > 10 &&
        this.info.next_episode != ""
      )
        window.location.replace("/#/player/" + this.info.next_episode);
      else window.location.replace("/#/view/" + this.info.season_id);
    },

    playerStateChanged(playerCurrentState) {
      var duration = (this.duration = Math.floor(this.player.currentTime()));

      var open_starttime = this.info.starting_opening;
      var open_endtime = open_starttime + this.info.duration_opening;

      if (duration >= open_starttime && duration < open_endtime) {
        this.show = true;
      } else this.show = false;

      var ending_starttime = this.info.starting_ending;
      var ending_endtime = ending_starttime + this.info.duration_ending;
      if (duration >= ending_starttime && duration < ending_endtime) {
        this.shownext = true;
      } else this.shownext = false;
    },

    playerReadied(readyplayer) {
      axios
        .get("/api/v1/anime/video/" + this.$route.params.id)
        .then(response => this.player.src(response.data.files.zet_720));
      //console.log(this.player.src);
    },
    onPlayerWaiting(waitingPlayer) {
      //console.log(waitingPlayer);
    },
    updatetime() {
      this.player.currentTime(
        this.info.starting_opening + this.info.duration_opening
      );
    },
    endskip() {
      if (
        this.info.duration_addition != 0 &&
        this.info.duration_addition != null
      ) {
        this.player.currentTime(
          this.info.starting_ending + this.info.duration_ending
        );
      } else
        this.player.currentTime(
          this.player.currentTime() + this.player.remainingTime()
        );
    }
  }
};
</script>

<style>
.video-js .vjs-time-control {
  display: block;
}
.skipper {
  width: 100%;
  color: #fff;
  background-color: rgba(255, 255, 255, 0.1);
  border-color: rgba(245, 124, 0, 0.4);
  text-align: center;
  border-radius: 5px;
}

.video-js {
  width: 100%;
  min-height: 360px;
  max-height: 80vh;
}

.video-js .vjs-tech {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
</style>
