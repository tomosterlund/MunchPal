<template>
    <MainLayout>
        <div id="RegistrationPage">

            <h1>Register your restaurant</h1>

            <transition name="slide">

                <FormOne
                    v-if="showForm == 1"
                    @form-submit="submitFormOne"
                    @name-change="rDetails.name = $event"
                    @address-change="rDetails.address = $event"
                    @zip-change="rDetails.zip = $event"
                    @city-change="rDetails.city = $event"
                    @category-change="rDetails.tag_one = $event"
                />

                <FormTwo
                    v-if="showForm == 2"
                    @form-submit="submitFormTwo"
                    @email-change="rDetails.email = $event"
                    @password-change="rDetails.password = $event"
                    @pwc-change="rDetails.pwConfirm = $event"
                    :loading="loading"
                />
            </transition>

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
import Backdrop from './../../components/App/Backdrop'
import MainLayout from '../../components/App/MainLayout.vue'
import Input from './../../components/Forms/Input'
import MunchButton from '../../components/Forms/MunchButton.vue'
import Modal from '../../components/UI/Modal.vue'
import Axios from 'axios'
import FormOne from '../../components/Restaurants/Registration/FormOne.vue'
import FormTwo from './../../components/Restaurants/Registration/FormTwo.vue'
import RestaurantApis from './../../api/restaurant-api'

export default {
    components: {
        MainLayout,
        Input,
        MunchButton,
        Modal,
        Backdrop,
        FormOne,
        FormTwo
    },
    data() {
        return {
            rDetails: {
                name: '',
                address: '',
                zip: '',
                city: '',
                email: '',
                password: '',
                pwConfirm: '',
                tag_one: ''
            },
            showModal: false,
            showForm: 1,
            loading: false
        }
    },
    methods: {
        submitFormOne() {
            console.log('submitted form one');
            this.showForm = 2;
        },
        async submitFormTwo() {
            this.loading = true;
            const registrationAPI = await RestaurantApis.registerRestaurant(this.rDetails);
            console.log(registrationAPI);
            this.loading = false;
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
    position: relative;

    h1 {
        font-size: 1.8rem;
    }
}

h2 {
    font-size: 1.2rem;
}


.slide-enter-active, .slide-leave-active {
    transition: all 0.3s;
    opacity: 1;
}

.slide-leave-to {
    transform: translateX(-200%);
}

.slide-enter {
    opacity: 0;
}

</style>