<template>
    <MainLayout>
        <div id="SignInPage">

            <h1>
                Sign in
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

            <font-awesome-icon
                v-if="loading"
                class="LoadingIcon"        
                icon="sync"
            />

        </div>
    </MainLayout>
</template>

<script>
import MainLayout from '../components/App/MainLayout.vue'
import Input from '../components/Forms/Input.vue'
import MunchButton from '../components/Forms/MunchButton.vue'
import userApis from './../api/user-apis'

export default {
    components: { MainLayout, Input, MunchButton },
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
            const userData = await userApis.signinUserHandler(this.email, this.password);
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

.LoadingIcon {
    margin: 32px 0;
    transform-origin: center;
    animation: SPIN;
    animation-duration: 1.5s;
    animation-iteration-count: infinite;
    animation-timing-function: linear;
}

@keyframes SPIN {
    0% {
        transform: rotateZ(0deg);
    }

    100% {
        transform: rotateZ(360deg);
    }
}


</style>