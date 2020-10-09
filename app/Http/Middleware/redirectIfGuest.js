export default function ({ app, redirect, route }) {
  if (!app.$auth.loggedIn) {
    return redirect({
      name: 'auth-signin',
      query: {
        redirect: route.fullPath
      }
    })
  }
}
