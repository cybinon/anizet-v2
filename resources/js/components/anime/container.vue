<template>
  <div>
    <div class="user">
      <router-view></router-view>
    </div>

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
