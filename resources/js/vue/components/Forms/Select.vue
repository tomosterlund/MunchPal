// @param optionsArr: array == eine Array mit alle Optionen in der Select
// @param label: string == Name vom Select
// $emit form-update == wenn der Wert sich verändert. 

<template>
    <div class="InputContainer">
        <select
            required
            name="select"
            v-model="selectValue"
        >
            <option
                v-for="option in optionsArr"
                :key="option"
            >
                {{option}}
            </option>

        </select>

        <label v-bind:for="label">
            {{label}}
        </label>

        <label class="BottomBorder"></label>
    </div>
</template>

<script>
export default {
    props: [
        'optionsArr',
        'label'
    ],
    data() {
        return {
            selectValue: ''
        }
    },
    watch: {
        selectValue(newVal, oldVal) {
            this.$emit('form-update', this.selectValue);
        }
    }
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

    select {
        position: absolute;
        bottom: 0;
        width: 320px;
        outline: none;
        border: 0;
        background-color: transparent;
        margin-bottom: -20xp;
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

    .BottomBorder {
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        pointer-events: none;
        transition: all 0.25s ease;
    }

    select:focus + label, select:valid + label {
        bottom: 30px;
        font-size: 0.75rem;
        color: #6574cd;
        font-weight: 800;
    }

    select:focus + label, select:valid .BottomBorder, select:focus .BottomBorder {
        border-bottom: 2px solid #6574cd;
    }

}

</style>