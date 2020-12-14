<template>
  <a href="#" @click.prevent="viewItem()">
    <el-card shadow="never" class="no-border product-card">
      <div class="product-img">
        <el-image
          src="https://product.hstatic.net/200000201725/product/_nik2948_ee540c0a34d4403594ebe096e1f6accb_grande.jpg"
          :fit="'cover'"
        />
        <div class="product-overlay">
          <el-button-group class="product-actions">
            <el-button
              type="primary"
              icon="el-icon-shopping-cart-2"
              @click.prevent.stop="addToCard()"
            ></el-button>
          </el-button-group>
        </div>
      </div>
      <div class="py-3">
        <h3 class="product-name ma-0 pb-2">Yummy hamburger</h3>
        <span class="product-price font-s-12">123.465$</span>
      </div>
    </el-card>
  </a>
</template>

<script>
export default {
  methods: {
    viewItem() {
      console.log(1);
    },
    addToCard() {
      console.log("add card");
    }
  }
};
</script>
<style>
img.product-img .el-image {
  width: 100%;
}
.product-img {
  position: relative;
}
.product-overlay {
  transition: 0.5s ease;
  background-color: rgba(0, 0, 0, 0);
  opacity: 0;
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
}
.product-overlay .product-actions {
  position: absolute;
  bottom: 10px;
  right: 10px;
}
.product-card:hover .product-overlay {
  background-color: rgba(0, 0, 0, 0.3);
  opacity: 1;
}
</style>
