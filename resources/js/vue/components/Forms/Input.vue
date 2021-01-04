// Input Komponent
// @param fieldName: string
// @param inputType: string
// @param label: string
// $emit inputUpdated

<template>
    <div class="InputContainer">
        <input :type="inputType" required>
        <label v-bind:for="fieldName">
            {{label}}
        </label>

        <label class="BottomBorder"></label>
    </div>
</template>

<script>
export default {
    props: [
        'fieldName',
        'inputType',
        'label'
    ]
}
</script>

<style lang="scss" scoped>

.InputContainer {
    position: relative;
    width: 320px;
    height: 50px;
    padding: 0;
    margin: 14px 0 0 0;
    border-bottom: 1px solid black;

    input {
        height: 100%;
        width: 100%;
        margin: 0;
        border: 0;
        outline: none;
        padding-top: 20px;
        background-color: inherit;
    }

    label {
        position: absolute;
        bottom: 0;
        left: 2px;
        padding: 0;
        margin: 0;
        pointer-events: none;
        transition: all 0.25s ease;
    }

    input:focus + label, input:valid + label {
        bottom: 30px;
        font-size: 0.75rem;
        color: #6574cd;
        font-weight: 800;
    }

    .BottomBorder {
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        pointer-events: none;
        transition: all 0.25s ease;
    }

    input:focus + label, input:valid .BottomBorder, input:focus .BottomBorder {
        border-bottom: 2px solid #6574cd;
    }
}

</style>