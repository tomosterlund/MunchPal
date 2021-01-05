import Home from './../pages/Home'
import Register from './../pages/Register'
import SignIn from './../pages/SignIn'
import RestaurantRegistration from './../pages/Restaurants/RegisterRestaurant'
import RestaurantSignin from './../pages/Restaurants/SigninRestaurant'

export const routes = [
    { path: '/', component: Home },
    { path: '/register', component: Register },
    { path: '/signin', component: SignIn },
    { path: '/restaurants/register', component: RestaurantRegistration },
    { path: '/restaurants/signin', component: RestaurantSignin }
]