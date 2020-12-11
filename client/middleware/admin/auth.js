export default async function ({ store, redirect, route, app, next }) {
  // consts
  const blockRoute = /\/admin\/*/g
  const token = store.state.admin.auth.token
  const login = '/admin/login'
  // If the user is not authenticated
  if (route.path.match(blockRoute)) {
    if (token) {
      await app.$api.admin.auth.getCurrentUser()
        .then((res) => {
          store.commit('admin/auth/SUCCESS_AUTH', res)
          if (route.path === login) {
            redirect('/admin')
          }
          return next
        }).catch((e) => {
          store.commit('admin/auth/SET_TOKEN', null)
          return redirect(login)
        })
    } else {
      return redirect(login)
    }
  }
}
