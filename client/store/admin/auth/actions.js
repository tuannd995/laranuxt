export default {
  async login({ commit }, data) {
    try {
      const token = await this.$api.admin.auth.login(data)
      commit('SET_TOKEN', token)
      this.$router.push('/admin')
    } catch (err) {
      throw err
    }
  },
  async logout({ commit }) {
    await this.$api.admin.auth.logout()
    await this.$cookies.remove('admin_token')
    commit('LOG_OUT')
    location.href = '/admin/login'
  }
}
