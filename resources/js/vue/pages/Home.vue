<template>
    <MainLayout>
        <div class="home-page-container">

            <h1>
                Food is on the way!
            </h1>

            <font-awesome-icon
                icon="utensils"
                class="FoodIcon"
            />

            <WideButton
                text="Sign in"
                bg="#6574cd"
                color="#fff"
                border="#6574cd"
                @clicked="$router.push('/signin')"
            />

            <WideButton
                text="Register"
                bg="#6574cd"
                color="#fff"
                border="#6574cd"
                @clicked="$router.push('/register')"
            />

            <WideButton
                text="Register your restaurant"
                bg="transparent"
                color="#6574cd"
                border="#6574cd"
                @clicked="$router.push('/restaurants/register')"
            />

            <WideButton
                text="Restaurant login"
                bg="transparent"
                color="#6574cd"
                border="#6574cd"
                @clicked="$router.push('/restaurants/signin')"
            />
        </div>
    </MainLayout>
</template>

<script>
import MainLayout from '../components/App/MainLayout.vue'
import WideButton from '../components/Forms/WideButton.vue'

export default {
  components: { MainLayout, WideButton },

}
</script>

<style lang="scss" scoped>

.home-page-container {
    display: flex;
    flex-flow: column;
    align-items: center;

    h1 {
      margin: 16px 0;
    }

    .FoodIcon {
      font-size: 48px;
    }
}

</style>