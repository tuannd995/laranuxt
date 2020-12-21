<template>
  <el-card class="box-card">
    <h1>Post Manager</h1>
    <el-table :data="data" style="width: 100%">
      <el-table-column label="Id" prop="id"> </el-table-column>
      <el-table-column label="Name" prop="name"> </el-table-column>
      <el-table-column label="Email" prop="email"> </el-table-column>
      <el-table-column label="Role" prop="role.name"> </el-table-column>
      <el-table-column align="right">
        <template slot="header" slot-scope="scope">
          <el-input
            v-model="search"
            size="mini"
            placeholder="Type to search"
            @input="filter($event)"
          />
        </template>
        <template slot-scope="scope">
          <el-button size="mini" @click="handleEdit(scope.$index, scope.row)"
            >Edit</el-button
          >
          <el-button
            size="mini"
            type="danger"
            @click="handleDelete(scope.$index, scope.row)"
            >Delete</el-button
          >
        </template>
      </el-table-column>
    </el-table>
    <el-pagination
      class="pt-2"
      @size-change="handleSizeChange"
      @current-change="handleCurrentChange"
      :current-page.sync="pagination.current"
      :page-sizes="[10, 20, 50, 100]"
      :page-size="pagination.size"
      layout="total, sizes, prev, pager, next, jumper"
      :total="pagination.total"
    >
    </el-pagination>
  </el-card>
</template>

<script>
import _ from "lodash";
export default {
  head() {
    return {
      title: "User Manager"
    };
  },
  layout: "admin/layout",
  data() {
    return {
      pagination: {
        current: 1,
        size: 10,
        total: 1
      },
      data: [],
      search: ""
    };
  },
  async asyncData({ app, error }) {
    try {
      const res = await app.$api.admin.user.index();
      return {
        data: res.data,
        pagination: res.pagination
      };
    } catch (e) {
      error(e);
    }
  },
  methods: {
    async getPosts() {
      const res = await this.$api.admin.user.index(
        this.search,
        this.pagination.current,
        this.pagination.size
      );
      this.data = res.data;
      this.pagination = res.pagination;
    },
    handleEdit(index, row) {
      console.log(index, row);
    },
    handleDelete(index, row) {
      console.log(index, row);
    },
    handleCurrentChange(event) {
      this.pagination.current = parseInt(event)
      this.getPosts()
    },
    handleSizeChange(event) {
      this.pagination.size = parseInt(event)
      this.getPosts()
    },
    filter(keyword) {
      const vm = this
      vm.search = keyword
      setTimeout(() => {
        vm.getUsers();
      }, 500);
    }
  }
};
</script>
