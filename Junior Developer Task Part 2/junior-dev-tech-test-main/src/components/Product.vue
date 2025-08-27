<template>
  <div id="product">
    <!-- Add your code here -->
    <p class="text-center">{{ product.product_title }}</p>
  </div>
</template>

<script>
import product from '../assets/Product.json'

export default {
  name: 'ProductPage',
  data() {
    return {
      product: product,
      // Add any other data properties you need
    }
  },
  // Any Vue lifecycle hooks and custom JavaScript code can be added here
}
</script>

<style scoped lang="scss">
// Styling to be added here if needed. SASS is allowed if preferred
</style>
