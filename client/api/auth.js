export default axios => ({
  async login(data) {
    const res = await axios.post("admin/auth/login", data);
    return res.data;
  },
  async logout() {
    const res = await axios.post("admin/auth/logout", data);
    return res.data;
  },
  async getCurrentUser() {
    const res = await axios.post("admin/auth/user", data);
    return res.data;
  }
});
