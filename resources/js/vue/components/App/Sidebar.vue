// Der Menu Sidebar
// @param show == ein boolean, der bei true der Sidebar sichtbar macht.

<template>
    <div id="Sidebar" :class="{ Show: showComponent, Hide: !showComponent }">

        <UserOptions v-if="authStatus == 'auth'" />

        <ul
            v-for="menuItem in menuList[authStatus]"
            :key="menuItem.path"
        >
            <li>
                <router-link :to="menuItem.path">
                    <font-awesome-icon :icon="menuItem.icon" />
                    <span>
                        {{ menuItem.text }}
                    </span>
                </router-link>
            </li>
        </ul>

    </div>
</template>

<script>

import UserOptions from './UserOptions'

export default {
    components: {UserOptions},
    props: [
        'show'
    ],
    data() {
        return {
            showComponent: false,
            menuList: {
                unauth: [
                    { path: '/', icon: 'home', text: 'Home'},
                    { path: '/register', icon: 'user-plus', text: 'Sign up' },
                    { path: '/signin', icon: 'sign-in-alt', text: 'Sign in' }
                ],
                auth: [
                    { path: '/', icon: 'home', text: 'Home'},
                ]
            },
            count: 1
        }
    },
    computed: {
        authStatus () {
            return this.$store.state.userModule.auth;
        }
    },
    watch: {
        show(newVal, oldVal) {
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

$blue: #3490dc;

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

    ul {
        list-style: none;
        padding: 0;

        a {
            color: black;
            display: flex;
            align-items: center;
            margin: 0.5em 0 0 1em;
            text-decoration: none;
            transition: color 0.12s linear;

            span {
                margin: 4px 0 0 0.5em;
            }
        }

        a:hover {
            color: $blue;
        }
    }

}

.Show {
    transform: translateX(0%);
}

.Hide {
    transform: translateX(-100%);
}

</style>