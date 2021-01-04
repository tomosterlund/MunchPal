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

            <MunchButton
                text="Sign up now"
                @clicked="signUpHandler"
            />

        </div>

        <Modal :show="showModal">
            <h2>
                Go to your email!
            </h2>

            <font-awesome-icon icon="paper-plane" />
        </Modal>

        <Backdrop
            v-if="showModal"
            @close-backdrop="showModal = !showModal"
        />
    </MainLayout>
</template>

<script>
import Backdrop from '../components/App/Backdrop.vue'
import MainLayout from '../components/App/MainLayout.vue'
import Input from '../components/Forms/Input.vue'
import MunchButton from '../components/Forms/MunchButton.vue'
import Modal from '../components/UI/Modal.vue'
import Axios from 'axios'

export default {
    components: {
        MainLayout,
        Input,
        MunchButton,
        Modal,
        Backdrop
    },
    data() {
        return {
            showModal: false
        }
    },
    methods: {
        signUpHandler() {
            this.showModal = true;
        }
    }
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

h2 {
    font-size: 1.2rem;
}

</style>