<template>
    <MainLayout>
        <div id="RegistrationPage">

            <h1>Register</h1>

            <Input
                fieldName="fullName"
                inputType="text"
                label="Full name"
            />

            <Input
                fieldName="email"
                inputType="text"
                label="Email"
            />

            <Input
                fieldName="password"
                inputType="password"
                label="Choose password"
            />

            <Input
                fieldName="confirmPassword"
                inputType="password"
                label="Confirm your password"
            />

        </div>
    </MainLayout>
</template>

<script>
import MainLayout from '../components/App/MainLayout.vue'
import Input from '../components/Forms/Input.vue'

export default {
    components: {MainLayout, Input}
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