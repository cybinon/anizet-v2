<template>
  <div>
    <div class="row">
      <div class="col">
        <div class="text-center h4">Анги: {{ info.episode_number }} {{ info.episode_caption }}</div>
      </div>
    </div>
    <video-player
      class="video-player-box vjs-theme-forest mx-auto"
      ref="videoPlayer"
      @statechanged="playerStateChanged($event)"
      @playing="onPlayerPlaying($event)"
      @waiting="onPlayerWaiting($event)"
      @ready="playerReadied"
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
        <v-btn to="player/3" class="w-100" color="orange" medium>Дараагийн анги</v-btn>
      </div>
    </div>
  </div>
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
      info: null,
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
    onPlayerPlaying(playerCurrentState) {
      var duration = (this.duration = Math.floor(
        playerCurrentState.currentTime()
      ));

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

    playerStateChanged(playerCurrentState) {},

    playerReadied(readyplayer) {
      console.log(
        "the readyplayer is readied",
        this.$refs.videoPlayer.player.currentTime()
      );
    },
    onPlayerWaiting(waitingPlayer) {
      console.log(waitingPlayer);
    },
    updatetime() {
      this.player.currentTime(this.info.duration_opening);
    }
  }
};
</script>

<style>
.video-js .vjs-time-control {
  display: block;
}
.skipper {
  width: 80%;
  color: #fff;
  background-color: rgba(255, 255, 255, 0.1);
  border-color: rgba(245, 124, 0, 0.4);
  text-align: center;
  border-radius: 5px;
}

.video-js {
  width: 80%;
  margin-left: auto;
  margin-right: auto;

  height: auto;
}

.video-js .vjs-tech {
  position: relative;
  width: 100%;
  height: auto;
}
</style>
