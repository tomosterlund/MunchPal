// Ein Backdrop, der den ganzen Schirm deckt.
// Soll mit Modals oder der Sidebar benutzt werden
// @param n/a

<template>
    <div
        @click="$emit('close-backdrop')"
        id="Backdrop"
    >

    </div>
</template>

<style lang="scss" scoped>

#Backdrop {
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh;
    width: 100vw;
    background-color: rgba(0, 0, 0, 0.5);
}

</style>