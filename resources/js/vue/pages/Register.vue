<template>
    <MainLayout>
        <div id="RegistrationPage">

            <h1>Register</h1>

        </div>
    </MainLayout>
</template>

<script>
import MainLayout from '../components/App/MainLayout.vue'

export default {
    components: {MainLayout}
}
</script>

<style lang="scss" scoped>

#RegistrationPage {
    margin: 1em 0;
    display: flex;
    flex-flow: column;
    align-items: center;

    h1 {
        font-size: 1.8rem;
    }
}

</style>