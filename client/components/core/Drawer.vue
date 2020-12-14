<template>
  <div :class="{ 'has-logo': showLogo }">
    <coreLogo v-if="showLogo" :collapse="isCollapse" />
    <el-scrollbar wrap-class="scrollbar-wrapper">
      <el-menu
        :default-active="activeRoute"
        :collapse="isCollapse"
        :background-color="variables.menuBg"
        :text-color="variables.menuText"
        :unique-opened="false"
        :active-text-color="variables.menuActiveText"
        :collapse-transition="false"
        mode="vertical"
        router
      >
        <coreSidebarItem
          v-for="route in routes"
          :key="route.name"
          :item="route"
        />
      </el-menu>
    </el-scrollbar>
  </div>
</template>

<script>
import variables from '@/assets/styles/variables.scss'
import routes from '@/config/routes'
export default {
  computed: {
    sidebar() {
      return this.$store.getters['admin/sidebar']
    },
    routes() {
      return routes
    },
    showLogo() {
      return this.$store.state.admin.settings.sidebarLogo
    },
    variables() {
      return variables
    },
    isCollapse() {
      return !this.sidebar.opened
    },
    activeRoute() {
      const route = this.$route
      const { name } = route
      return name
    }
  },
  methods: {}
}
</script>
