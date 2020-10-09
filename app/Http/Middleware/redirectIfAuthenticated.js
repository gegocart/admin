export default function ({ app, redirect, route }) {
	if (app.$auth.loggedIn) {
	 return redirect({
      name: 'index'
    })
  }
}
