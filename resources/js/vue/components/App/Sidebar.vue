<template>
    <div id="Sidebar" :class="{ Show: showComponent, Hide: !showComponent }">
        This is some sidebar content
    </div>
</template>

<script>
export default {
    props: [
        'show'
    ],
    data() {
        return {
            showComponent: false
        }
    },
    watch: {
        show(newVal, oldVal) {
            console.log('this runs');
            if (newVal == true) {
                return this.showComponent = true;
            } else if (newVal == false) {
                return this.showComponent = false;
            }
        }
    }
}
</script>

<style lang="scss" scoped>

#Sidebar {
    width: 65%;
    height: 100vh;
    max-width: 300px;
    background-color: white;
    position: fixed;
    left: 0;
    top: 0;
    z-index: 1000;
    transition: all 0.20s linear;
}

.Show {
    transform: translateX(0%);
}

.Hide {
    transform: translateX(-100%);
}

</style>