<template>
  <footer class="footer">
    <div class="footer-area px-20 py-4">
      <el-row :gutter="20">
        <el-col class="my-1" v-for="item in 3" :key="item" :sm="{ span: 8 }">
        </el-col>
      </el-row>
    </div>
    <div class="copyright">
      <h5 class="text-center ma-2">Copy right @htshop by Neolasdo</h5>
    </div>
  </footer>
</template>
<script>
export default {};
</script>
