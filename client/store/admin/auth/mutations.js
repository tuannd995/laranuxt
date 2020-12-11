export default {
  SUCCESS_AUTH(state, data) {
    state.user = data
  },
  LOG_OUT(state) {
    state.user = null
    state.token = undefined
  },
  SET_TOKEN(state, payload) {
    state.token = payload;
    this.$cookies.set(`admin_token`, payload);
  }
}
