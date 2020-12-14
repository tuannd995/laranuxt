<template>
  <div>
    <el-row type="flex" justify="center" class="bg-gray-light">
      <el-col :span="24" class="px-4 py-1 text-center">
        <span class="font-s-12">Fugiat anim cupidatat magna ex dolore aute exercitation fugiat commodo non fugiat labore nisi. </span>
      </el-col>
    </el-row>
    <app-nav />
  </div>
</template>

<script>
import Nav from "./Nav";
export default {
  data() {
    return {};
  },
  components: {
    "app-nav": Nav
  },
  methods: {}
};
</script>