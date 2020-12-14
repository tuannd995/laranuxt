<template>
  <div class="main-area">
    <section class="carousel banner-area pc-only">
      <el-carousel
        class="banner-ext"
        trigger="click"
        height="500px"
        arrow="always"
        :autoplay="false"
      >
        <el-carousel-item v-for="item in 4" :key="item">
          <img src="https://picsum.photos/1000/500" class="full-width" alt="" />
        </el-carousel-item>
      </el-carousel>
    </section>

    <section class="widget mt-4">
      <h2 class="list-title text-center my-5 font-s-28">
        New Products
      </h2>
      <el-row :gutter="20">
        <el-col
        class="my-1"
          v-for="item in 10"
          :key="item"
          :lg="{ span: 4 }"
          :md="{ span: 6 }"
          :sm="{ span: 6 }"
        >
          <product-item></product-item>
        </el-col>
      </el-row>
    </section>
    <section class="widget mt-4">
      <h2 class="list-title text-center my-5 font-s-28">
        Sale Products
      </h2>
      <el-row :gutter="20">
        <el-col
        class="my-1"
          v-for="item in 15"
          :key="item"
          :lg="{ span: 4 }"
          :md="{ span: 6 }"
          :sm="{ span: 6 }"
        >
          <product-item></product-item>
        </el-col>
      </el-row>
    </section>
    <section class="widget mt-4">
      <h2 class="list-title text-center my-5 font-s-28">
        Blog Posts
      </h2>
      <el-row :gutter="20">
        <el-col
        class="my-1"
          v-for="item in 15"
          :key="item"
          :lg="{ span: 4 }"
          :md="{ span: 6 }"
          :sm="{ span: 6 }"
        >
          <product-item></product-item>
        </el-col>
      </el-row>
    </section>
  </div>
</template>

<script>
import ProductItem from "@/components/ProductItem";
export default {
  layout: "frontend",
  components: {
    "product-item": ProductItem
  }
};
</script>
