// Modal
// @param == children die in der slot eingefügt werden
// @param show: boolean == wenn show = true, wird der Modal gezeigt, wenn false nicht

<template>
    <div class="ModalContainer" :class="{Show: show, Hide: !show}">
        <slot>
            sdfs
        </slot>
    </div>
</template>

<script>
export default {
    props: ['show']
}
</script>

<style lang="scss" scoped>

.ModalContainer {
    width: 90%;
    max-width: 400px;
    height: fit-content;
    background: white;
    border-radius: 4px;
    display: flex;
    flex-flow: column;
    align-items: center;
    padding: 16px;
    margin:auto; 
    position: fixed;
    left: 50%;
    transform: translateX(-50%);
    z-index: 1000;
    transition: all 0.25s ease;
}

.Show {
    top: 25%;
}

.Hide {
    top: -100%;
}

</style>