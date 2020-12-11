export default axios => ({
  async login(data) {
    const res = await axios.$post("admin/login", data);
    return res.data.token;
  },
  async logout() {
    const res = await axios.$post("admin/logout");
    return res.data;
  },
  async getCurrentUser() {
    const res = await axios.$get("admin/user");
    return res.data;
  }
});
