// Das zweite Formular das gezeigt wird, wenn ein Restaurant sich registriert.
// @param loading: boolean == wenn die App auf eine API response wartet
// $emit form-submit, mit payload restaurantDetails: { name: '', address: '', zip: '', city: '' } 

<template>
    <div class="form-two">
        <Input
            @inputevent="$emit('email-change', $event)"
            fieldName="email"
            inputType="email"
            label="Email"
        />

        <Input
            @inputevent="$emit('password-change', $event)"
            fieldName="password"
            inputType="password"
            label="Choose a password"
        />

        <Input
            @inputevent="$emit('pwc-change', $event)"
            fieldName=pwConfirm
            inputType="password"
            label="Confirm your password"
        />

        <MunchButton
            v-if="!loading"
            text="Finish registration"
            @clicked="$emit('form-submit')"
        />

        <Spinner
            v-if="loading"
        />

    </div>
</template>

<script>
import Input from './../../Forms/Input'
import MunchButton from '../../Forms/MunchButton'
import Spinner from './../../UI/Spinner.vue'

export default {
    components: {
        Input,
        MunchButton,
        Spinner
    },
    data() {
        return {
            r: {
                name: '',
                address: '',
                zip: '',
                city: ''
            }
        }
    },
    props: [
        'loading'
    ]
}
</script>

<style>

.form-two {
    display: flex;
    flex-flow: column;
    align-items: center;
    transition: all 1s ease;
    position: absolute;
    top: 36px;
}

</style>