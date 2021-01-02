<template>
    <MainLayout>
        <div id="SignInPage">
            <h1>
                Sign in
            </h1>
        </div>
    </MainLayout>
</template>

<script>
import MainLayout from '../components/App/MainLayout.vue'
export default {
  components: { MainLayout },

}
</script>

<style lang="scss" scoped>

#SignInPage {
    margin: 1em 0;
    display: flex;
    flex-flow: column;
    align-items: center;

    h1 {
        font-size: 1.8rem;
    }
}


</style>