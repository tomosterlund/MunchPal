// Der sign in page für Restaurants
// route == '/restaurants/signin'

<template>
    <MainLayout>
        <div id="SignInPage">

            <h1>
                Restaurant signin
            </h1>

            <Input
                fieldName="email"
                inputType="text"
                label="Email"
                @inputevent="email = $event"
            />

            <Input
                fieldName="password"
                inputType="password"
                label="Password"
                @inputevent="password = $event"
            />

            <MunchButton
                v-if="!loading"
                text="Sign in"
                @clicked="signinHandler"
            />

            <Spinner
                v-if="loading"
            />

        </div>
    </MainLayout>
</template>

<script>
import MainLayout from './../../components/App/MainLayout'
import Input from './../../components/Forms/Input.vue'
import MunchButton from './../../components/Forms/MunchButton.vue'
import RestaurantAPI from './../../api/restaurant-api'
import Spinner from '../../components/UI/Spinner.vue'

export default {
    components: { MainLayout, Input, MunchButton, Spinner },
    data() {
        return {
            email: '',
            password: '',
            loading: false
        }
    },
    methods: {
        async signinHandler() {
            this.loading = true;
            const userData = await RestaurantAPI.signinRestaurant(this.email, this.password);
            console.log(userData);
            this.loading = false;
            this.$router.push('/');
        }
    }
}
</script>

<style lang="scss" scoped>

#SignInPage {
    margin: 1em 0;
    display: flex;
    flex-flow: column;
    align-items: center;

    h1 {
        font-size: 1.8rem;
    }


}

</style>