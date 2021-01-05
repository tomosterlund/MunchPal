<template>
    <font-awesome-icon
        class="LoadingIcon"        
        icon="sync"
    />
</template>

<script>
export default {

}
</script>

<style>

.LoadingIcon {
    margin: 32px 0;
    transform-origin: center;
    animation: SPIN;
    animation-duration: 1.5s;
    animation-iteration-count: infinite;
    animation-timing-function: linear;
}

@keyframes SPIN {
    0% {
        transform: rotateZ(0deg);
    }

    100% {
        transform: rotateZ(360deg);
    }
}

</style>