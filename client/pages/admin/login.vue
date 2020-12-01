<template>
    <el-form
      ref="loginForm"
      :model="loginForm"
      :rules="loginRules"
      class="login-form"
      auto-complete="on"
      label-position="left"
    >
      <div class="title-container">
        <h3 class="title">Admin Login</h3>
      </div>

      <el-form-item prop="email">
        <i class="icon el-icon-user"></i>
        <el-input
          ref="email"
          v-model="loginForm.email"
          placeholder="UserName"
          name="email"
          tabindex="1"
          auto-complete="on"
        />
      </el-form-item>

      <el-form-item prop="password">
        <i class="icon el-icon-lock"></i>
        <el-input
          ref="password"
          :key="passwordType"
          v-model="loginForm.password"
          :type="passwordType"
          @keyup.enter.native="handleLogin"
          placeholder="Password"
          name="password"
          tabindex="2"
          auto-complete="on"
        />
        <span @click="showPwd" class="show-pwd">
          <i
            :class="
              passwordType === 'password' ? 'el-icon-turn-off' : 'el-icon-open'
            "
            class="icon"
          />
        </span>
      </el-form-item>
      <el-alert v-if="hasErr" :title="errMsg" type="error" show-icon></el-alert>
      <el-button
        :loading="loading"
        @click.native.prevent="handleLogin(loginForm)"
        type="success"
        style="width:100%;margin-bottom:30px;"
        >Login</el-button
      >
    </el-form>
</template>

<script>
export default {
  name: "Login",
  layout: "admin/auth",
  data() {
    return {
      loginForm: {
        email: "admin@a.com",
        password: "11111111"
      },
      hasErr: false,
      errMsg: "",
      loginRules: {
        email: [
          {
            type: "email",
            min: 6,
            trigger: ["blur", "change"]
          }
        ],
        password: [{ required: true, min: 8, trigger: "blur" }]
      },
      loading: false,
      passwordType: "password"
    };
  },
  methods: {
    showPwd() {
      if (this.passwordType === "password") {
        this.passwordType = "";
      } else {
        this.passwordType = "password";
      }
      this.$nextTick(() => {
        this.$refs.password.focus();
      });
    },
    handleLogin(loginForm) {
      this.loading = true;
      try {
        this.$refs.loginForm.validate(valid => {
          if (!valid) {
            this.loading = false;
            return false;
          } else {
            this.$store.dispatch("admin/auth/login", this.loginForm).catch(err => {
              this.hasErr = true;
              this.errMsg = err.message;
              this.loading = false;
            });
          }
        });
      } catch (err) {
        throw err;
      }
    }
  }
};
</script>
