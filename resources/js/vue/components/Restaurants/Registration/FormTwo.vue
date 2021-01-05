// Das erste Formular das gezeigt wird, wenn ein Restaurant sich registriert.
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
            text="Finish registration"
            @clicked="$emit('form-submit')"
        />
    </div>
</template>

<script>
import Input from './../../Forms/Input'
import MunchButton from '../../Forms/MunchButton'

export default {
    components: {
        Input,
        MunchButton
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
    }
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