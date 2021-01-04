// Der Header Komponent für die ganze app
// @param n/a

<template>
    <div id="BarsContainer">
        
        <header>

            <div id="LogoContainer">
                <img src="https://www.flaticon.com/svg/static/icons/svg/1041/1041615.svg" />
                <p>
                    <span class="thin">Munch</span>Pal
                </p>
            </div>

            <font-awesome-icon
                @click="showSidebar = !showSidebar"
                icon="bars"
                class="menu-icon"
            />

        </header>

        <Sidebar
            :show="showSidebar"
        />

        <Backdrop
            @close-backdrop="showSidebar = !showSidebar"
            v-if="showSidebar"
        />

    </div>
</template>

<script>
import Backdrop from './Backdrop.vue'
import Sidebar from './Sidebar.vue'
export default {
    components: { Sidebar, Backdrop },
    data() {
        return {
            showSidebar: false
        }
    }
}
</script>

<style lang="scss" scoped>

header {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;

    #LogoContainer {
        display: flex;
        align-items: center;
        margin: 0 0.5em;

        img {
            width: 20px;
        }

        p {
            font-size: 1.5rem;
            margin: 0 0.5em;

            .thin {
                font-weight: 600;
            }
        }

    }

    .menu-icon {
        margin: 0 0.75em;
        font-size: 1.25rem;
        cursor: pointer;
    }

}

</style>