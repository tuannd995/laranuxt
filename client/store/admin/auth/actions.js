import Cookie from 'js-cookie'
export default {
  async login({ commit }, data) {
    try {
      const response = await this.$api.auth.login(data)
      const token = response.token
      const { user } = await this.$api.auth.getCurrentUser()
      Cookie.set('access_token', token)
      commit('SUCCESS_AUTH', user)
      this.$router.push('/admin')
    } catch (err) {
      throw err
    }
  },
  async logout({ commit }) {
    await this.$api.auth.logout()
    await Cookie.remove('access_token')
    location.href = '/'
    commit('LOG_OUT')
  }
}
