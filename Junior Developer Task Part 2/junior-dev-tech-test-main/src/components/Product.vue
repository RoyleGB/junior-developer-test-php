<template>
  <div id="product">
     
    <div class="grid-container">

      <!-- Main Image -->
      <div class="main-image-container">
        <div class="row">
          <div class="column">
            <img class="img-fluid" src="https://content.dare2b.com/RWW455_016/550/RWW455_016_01_bynder_defined_type_model_011744024753.jpg" alt="Top Left Image" />
            <img class="img-fluid" src="https://content.dare2b.com/RWW455_016/550/RWW455_016_02_bynder_defined_type_model_021744024753.jpg" alt="Top Right Image" />
          </div>

          <div class="column">
            <img class="img-fluid" src="https://content.dare2b.com/RWW455_016/550/RWW455_016_03_bynder_defined_type_model_031744024753.jpg" alt="Bottom Left Image" />
            <img class="img-fluid" src="https://content.dare2b.com/RWW455_016/550/RWW455_016_04_bynder_defined_type_model_041744024753.jpg" alt="Bottom Right Image" />
          </div>
        </div>
      </div>

      <!-- Product Details Information -->
      <div class="product-info">

        <!-- Product Details Container -->
        <div class="product-details-container">
          <p> {{ product.product_offer_label }} </p>
          <h4> {{  product.product_title }}</h4>
          <hr></hr>

          <!-- Price Section -->
          <div class="price-container">
            <div>
              <strong>Original</strong><br>
              <p style="text-decoration: line-through;">£{{ product.rrp }}</p>
            </div>
            <div>
              <strong>Now</strong><br>
              <p style="color: red;">£{{ product.selling_price }}</p>
            </div>

            <!-- Savings Section -->
            <div class="savings">
              <p>| Save {{ ((product.rrp - product.selling_price) / product.rrp * 100) }}% |</p>
            </div>
          </div>
          <hr></hr>

          <!--- Alternate Color Gallery --->
          <div class="alternate-gallery">
          <div class="row">
            <div class="col-2" v-for="(image, index) in product.alternative_colours" :key="index">
              <img class="alt-img-fluid" :src="image.image" :alt="image.alt" />
            </div>
          </div>
        </div>
        <hr></hr>

      <!-- Size Buttons -->
        <br />
        <p>Select Size</p>
        <div class="size-buttons-container">
            <button class="size-buttons" id="size-8" v-on:click="selectedSize(8)">8</button>
            <button class="size-buttons" id="size-10" v-on:click="selectedSize(10)">10</button>
            <button class="size-buttons" id="size-12" v-on:click="selectedSize(12)">12</button>
            <button class="size-buttons" id="size-14" v-on:click="selectedSize(14)">14</button>
            <button class="size-buttons" id="size-16" v-on:click="selectedSize(16)">16</button>
            <button class="size-buttons" id="size-18" v-on:click="selectedSize(18)">18</button>
            <button class="size-buttons" id="size-20" v-on:click="selectedSize(20)">20</button>
        </div>
      </div>

      <!-- Add to bag button -->
      <hr />
      <button class="bag-button" v-on:click="addToBag">Add to Bag</button>

      <!-- Product Description, Bullet Points and Product Code -->
      <br />
      <h5>Description</h5>
      <p class="description-text">{{ product.product_description }}</p>

      <div class="bulletpoint-text" v-html="product.product_bulletpoints"></div>
      <p><strong>Product Code:</strong> {{ product.product_sku }}</p>

    </div>
    </div>
  </div>
</template>

<script>
import product from './data/product.json';

export default {
  name: 'ProductPage',
  data() {
    return {
      product: product,
      sizeValue: null
      // Add any other data properties you need
    }
  },
  // Any Vue lifecycle hooks and custom JavaScript code can be added here
  methods: {

    // method to store size number in data property
    selectedSize(size) {
      this.sizeValue = size;
      if(size) {
        var button = document.getElementById("size-" + size);
        button.style.backgroundColor = "rgb(148, 241, 61)"; // Change background color to green
      }
    },

    // method to retrieve size and add to bag and display alert
    addToBag() {
      if (this.sizeValue) {
        // Logic to add the product with the selected size to the bag
        window.alert("You have Selected Size: " + this.sizeValue);
      } else {
        window.alert("Please select a size before adding to bag.");
      }
    }
  }
}
</script>

<style scoped lang="scss">

#product {
  margin: 15px; // outside spacing
}

.grid-container {
  display: grid; // create grid layout
  grid-template-columns: 900px auto; // two columns, first fixed width, second auto
  gap: 50px; // space between columns
  padding: 20px; // inside spacing
  align-items: start; // align items to the top
  height: 100%; // full height of container
}

.text-center {
  text-align: center; // center text alignment
}

.img-fluid {
  width: 100%; 
  height: 100%;
  max-width: 100%;
  padding: 5px;
  margin: 5px;
}
.img-fluid:hover {
  transform: scale(1.05); // enlarge image on hover
}

.main-image-container {
  width: 100%;
  height: auto;
}
.main-image-container .row {
  display: grid;
  grid-template-columns: 1fr 1fr; 
  grid-template-rows: auto auto;
  gap: 10px;
  
}

.main-image-container .column {
  display: contents; // allow grid items to span multiple rows/columns
}

.product-info {
  display: flex; // vertical stack of items
  flex-direction: column; // stack items vertically
  justify-content: flex-start; // align items to the top
}
.product-details-container {
  text-align: left;
}

.price-container {
  display: flex;
  gap: 40px;
  text-align: left;
}

.savings {
  display: flex;
  text-align: center;
  margin-left: auto;
  color: red;
  font-size: 18px;            
}

.row {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
}

.alt-img-fluid {
  width: 100%;
  height: auto;
}
.alt-img-fluid:hover {
  transform: scale(1.5);
}

.size-buttons-container {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin-top: 10px;
}

.size-buttons {
  width: 60px;
  height: 50px;
  font-size: 14px;
  text-align: center;
  background-color: white;
  display: inline-block;
  padding: 5px;
  gap: 10px;
}
.size-buttons:hover {
  background-color: rgb(148, 241, 61);
  color: rgb(0, 0, 0);
}

.bag-button {
  width: 100%;
  height: 50px;
  font-size: 16px;
  text-align: center;
  background-color: black;
  color: white;
  border: 1px solid black;
  border-radius: 50px;
}

.description-text {
  font-size: 14px;
}
.bulletpoint-text {
  font-size: 12px;
}
// Styling to be added here if needed. SASS is allowed if preferred
</style>
