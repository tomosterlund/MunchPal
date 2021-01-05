// Das erste Formular das gezeigt wird, wenn ein Restaurant sich registriert.
// $emit form-submit, mit payload restaurantDetails: { name: '', address: '', zip: '', city: '' } 

<template>
    <div class="form-one">
        <Input
            @inputevent="$emit('name-change', $event)"
            fieldName="fullName"
            inputType="text"
            label="Restaurant name"
        />

        <Input
            @inputevent="$emit('address-change', $event)"
            fieldName="address"
            inputType="text"
            label="Address"
        />

        <Input
            @inputevent="$emit('zip-change', $event)"
            fieldName="zip"
            inputType="text"
            label="Zip code"
        />

        <Input
            @inputevent="$emit('city-change', $event)"
            fieldName="city"
            inputType="text"
            label="City"
        />

        <MunchButton
            text="Done"
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

.form-one {
    display: flex;
    flex-flow: column;
    align-items: center;
    transition: all 1s ease;
    position: absolute;
    top: 36px;
}

</style>