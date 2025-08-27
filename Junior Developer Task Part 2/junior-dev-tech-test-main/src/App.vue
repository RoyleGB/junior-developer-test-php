<template>
  <div id="app">
    <div class="d-flex justify-content-center align-items-center flex-column">
      <img alt="Regatta Group" src="./assets/Regatta_Group-Logo.svg" width="200" height="80" class="py-3"/>
    </div>
    <Product/>
  </div>
</template>

<script>
import Product from './components/Product.vue'

export default {
  name: 'App',
  components: {
    Product
  }
}
</script>

<style lang="scss">
@import "~bootstrap/dist/css/bootstrap.min.css";
@import "./assets/css/poppins.css"

body {
  font-family: 'Poppins', sans-serif;
}
</style>
