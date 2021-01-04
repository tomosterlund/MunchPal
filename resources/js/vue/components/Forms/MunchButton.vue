// Eine Button
// @param text == der Text, den im Button hineingefügt wird.
// $emit click == ein event für den Parent, wenn der Button geglickt wird.

<template>
    <button>
        {{text}}
    </button>
</template>

<script>
export default {
    props: [
        'text'
    ]
}
</script>

<style lang="scss" scoped>

button {
    padding: 0.5rem 1.5rem;
    margin: 32px 0;
    border: 0;
    outline: none;
    border-radius: 4px;
    font-weight: 700;
    font-family: inherit;
    cursor: pointer;
    background-color: #6574cd;
    color: #fff;
}

button:hover {
    opacity: 0.92;
}

</style>