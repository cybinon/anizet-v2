<template>
  <video-bg
    @click="pause()"
    :sources="['introvid.mp4']"
    img="https://wallpapermemory.com/uploads/744/gintama-background-full-hd-332151.jpg"
  >
    <button class="btn btn-primary w-100">Play/Stop</button>
  </video-bg>
</template>

<script>
import VideoBg from "vue-videobg";

// or
export default {
  data: {
    videoElement: null,
    paused: null
  },
  methods: {
    updatePaused(event) {
      this.videoElement = event.target;
      this.paused = event.target.paused;
    },

    play() {
      this.videoElement.play();
    },
    pause() {
      this.videoElement.pause();
    }
  },
  computed: {
    playing() {
      return !this.paused;
    }
  },
  components: {
    "video-bg": VideoBg
  }
};
</script>

