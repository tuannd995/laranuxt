export default function ({ $axios, store, redirect }) {
    $axios.onRequest((config) => {
        if (store.state.admin.auth.token) {
            config.headers.common['Authorization'] = `Bearer ${store.state.admin.auth.token}`
        }
    })
    $axios.onError(error => {
        const code = parseInt(error.response && error.response.status)
        if (code === 401) {
            store.commit('admin/auth/SET_TOKEN', null);
            redirect(`admin/login`);
        }
    })
}
