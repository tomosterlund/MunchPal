import Axios from "axios";

class Restaurant {

    static async registerRestaurant(restaurant) {
        
        const { name, address, zip, city, email, password, tag_one } = restaurant;

        const { data } = await Axios.post('/api/restaurants', {
            name,
            address,
            zip,
            city,
            email,
            password,
            tag_one
        });

        return data;
    }

    static async signinRestaurant(email, password) {

        const { data } = await Axios.post('/restaurant-login', {
            email,
            password
        });

        return data;

    }

}

export default Restaurant;