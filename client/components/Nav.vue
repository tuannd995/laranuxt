<template>
  <el-menu
    :default-active="activeIndex2"
    class="main-menu"
    mode="horizontal"
    unique-opened
    @select="handleSelect"
    background-color="#fff"
    text-color="#050505"
    active-text-color="#409eff"
  >
    <li class="pull-left sp-only sp-only-inline menu-item">
      <el-popover placement="bottom" v-model="open">
        <el-menu
          class="no-border"
          mode="vertical"
          unique-opened
          default-active="2"
        >
          <el-submenu index="1">
            <template slot="title">
              <i class="el-icon-location"></i>
              <span>Navigator One</span>
            </template>
            <el-menu-item-group title="Group One">
              <el-menu-item index="1-1">item one</el-menu-item>
              <el-menu-item index="1-2">item one</el-menu-item>
            </el-menu-item-group>
            <el-menu-item-group title="Group Two">
              <el-menu-item index="1-3">item three</el-menu-item>
            </el-menu-item-group>
            <el-submenu index="1-4">
              <template slot="title">item four</template>
              <el-menu-item index="1-4-1">item one</el-menu-item>
            </el-submenu>
          </el-submenu>
          <el-menu-item index="2">
            <i class="el-icon-menu"></i>
            <span>Navigator Two</span>
          </el-menu-item>
        </el-menu>
        <span slot="reference">
          <i
            class="icon font-s-40"
            :class="open ? 'el-icon-close' : 'el-icon-s-unfold'"
            style="padding-left: 5px; line-height: 75px;"
          >
          </i>
        </span>
      </el-popover>
    </li>
    <li class="pull-left menu-item logo-item">
      <a href="/">
        <img src="~/assets/images/h2t-logo.png" class="app-logo" />
      </a>
    </li>
    <el-menu-item index="1">Processing Center</el-menu-item>
    <el-submenu index="2">
      <template slot="title">Workspace</template>
      <el-menu-item index="2-1">item one</el-menu-item>
      <el-menu-item index="2-2">item two</el-menu-item>
      <el-menu-item index="2-3">item three</el-menu-item>
      <el-submenu index="2-4">
        <template slot="title">item four</template>
        <el-menu-item index="2-4-1">item one</el-menu-item>
        <el-menu-item index="2-4-2">item two</el-menu-item>
        <el-menu-item index="2-4-3">item three</el-menu-item>
      </el-submenu>
    </el-submenu>
    <li class="pull-right action">
      <el-popover placement="bottom" width="350">
        <p>Are you sure to delete this?</p>
        <el-button slot="reference">
          <i class="icon el-icon-user"></i>
        </el-button>
      </el-popover>
      <el-popover placement="bottom">
        <p>Are you sure to delete this?</p>
        <el-button slot="reference">
          <el-badge :value="5">
            <i class="icon el-icon-shopping-cart-2"></i>
          </el-badge>
        </el-button>
      </el-popover>
    </li>
  </el-menu>
</template>

<script>
export default {
  data() {
    return {
      activeIndex: "1",
      activeIndex2: "1",
      open: false
    };
  },
  methods: {
    handleSelect(key, keyPath) {
      console.log(key, keyPath);
    }
  }
};
</script>

<style>
.menu-item {
  height: 75px;
  line-height: 75px;
}
.main-menu {
  padding: 0 100px;
  height: 75px;
}
.logo-item {
  height: 75px;
  max-width: 300px;
}
.app-logo {
  width: 100%;
  height: 70px;
}
.el-menu--horizontal > .el-menu-item,
li.action,
.el-menu--horizontal > .el-submenu .el-submenu__title {
  height: 74px;
  line-height: 74px;
}
@media screen and (max-width: 960px) {
  .main-menu {
    padding: 0;
  }
}

@media screen and (max-width: 768px) {
  .main-menu {
    padding: 0;
    height: 75px;
  }
  .logo-item {
    height: 75px;
    width: 50%;
  }
  .el-menu--horizontal > .el-menu-item,
  .el-menu--horizontal > .el-submenu .el-submenu__title {
    display: none;
  }
}

@media screen and (max-width: 360px) {
  .logo-item {
    display: none;
  }
}
</style>
