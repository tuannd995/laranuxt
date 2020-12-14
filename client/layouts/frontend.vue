<template>
  <div>
    <app-header />
    <nuxt />
    <app-footer />
  </div>
</template>

<script>
import Header from "../components/Header";
import Footer from "../components/Footer";
export default {
  components: {
    "app-header": Header,
    "app-footer": Footer
  }
};
</script>
<style>
.footer-area {
  height: 200px;
  background-color: #f7fbfd;
}
</style>
