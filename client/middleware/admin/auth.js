export default ({ store, redirect, route }) => {
  // consts
  const blockRoute = /\/admin\/*/g
  const user = store.getters['admin/auth']
  const login = '/admin/login'
  // If the user is not authenticated
  if (!user && route.path.match(blockRoute)) {
    return redirect(login)
  }

  if (user && route.path === login) {
    redirect('/admin')
  }
}
