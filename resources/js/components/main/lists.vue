<template>
  <div>
    <list1></list1>
    <!-- <list2></list2>
    <list3></list3>-->
  </div>
</template>
<script>
import carousel from "vue-owl-carousel";
import list1 from "./list1";
import list2 from "./list2";
import list3 from "./list3";
export default {
  components: {
    carousel,
    list1,
    list2,
    list3
  }
};
</script>
