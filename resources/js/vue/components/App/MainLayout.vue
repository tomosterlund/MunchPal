// Der main layout für die App
// @param child == der Body für jede Seite wo der Komponent benutzt wird. wird hier in "slot" hineingefügt

<template>
    <div id="MainContainer">

        <Header />

        <slot>

        </slot>
        
    </div>
</template>

<script>
import Header from './Header.vue'
export default {
  components: { Header },

}
</script>


Header<style>

#MainContainer {
    width: 100vw;
}

</style>