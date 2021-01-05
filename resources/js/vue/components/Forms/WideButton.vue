// Wide button
// @param text: string == den Text für den Button
// @param bg: string
// @param color: string
// @param border: string

<template>
    <button
        @click="$emit('clicked')"
        :style="{backgroundColor: bg, color: color, border: `2px solid ${border}`}"
    > 
        {{text}}
    </button>
</template>

<script>
export default {
    props: [
        'text',
        'bg',
        'color',
        'border'
    ]
}
</script>

<style lang="scss" scoped>

button {
    width: 240px;
    padding: 0.5rem 1.5rem;
    margin: 32px 0 0 0;
    border: 0;
    outline: none;
    border-radius: 4px;
    font-weight: 700;
    font-family: inherit;
    cursor: pointer;
}

button:hover {
    opacity: 0.92;
}

button:focus {
    outline: none;
}

</style>