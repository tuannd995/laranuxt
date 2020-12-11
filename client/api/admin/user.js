export default axios => ({
  async index(keyword = "", page = 1, per_page = 10) {
    console.log(keyword);
    const res = await axios.$get(`admin/users?keyword=${keyword}&page=${page}&per_page=${per_page}`)
    return res.data;
  }
});
