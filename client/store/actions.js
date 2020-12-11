export async function nuxtServerInit({ commit }, { app }) {
  const token = app.$cookies.get("admin_token");
  const sidebarStatus = app.$cookies.get("sidebarStatus");
  commit("admin/auth/SET_TOKEN", token)
  commit("admin/app/SET_SIDEBAR", sidebarStatus !== undefined ? sidebarStatus: true);
}
