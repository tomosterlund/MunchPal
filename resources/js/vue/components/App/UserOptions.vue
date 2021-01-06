// Ein Komponent der im Sidebar benutzt wird, und zeigt der Name der Benutzer der eingeloggt ist

<template>
    <div class="UserOptions">

        <div class="NameBox">
            <font-awesome-icon
                icon="user"
                class="UserIcon"
            />

            <p>
                {{userName}}
            </p>
        </div>

        <div class="OptionsBox">

            <button
                style="margin: 0 8px 0 0"
            >
                My orders
            </button>

            |

            <button
                @click="signoutHandler"
                style="margin: 0 0 0 8px"
            >
                Sign out
            </button>

        </div>

    </div>
</template>

<script>
export default {
    computed: {
        userName () {
            return this.$store.state.userModule.sessionUser.name
        }
    },
    methods: {
        signoutHandler() {
            this.$store.commit('setSessionUser', {
                name: '',
                email: ''
            });
            
            this.$store.commit('isUnauth');

            this.$store.commit('userType', '');

            this.$router.push('/');
        }
    }
}
</script>

<style lang="scss" scoped>

.UserOptions {
    padding: 8px;
    margin: 8px 0 16px 0;

    .NameBox {
        display: flex;
        align-items: center;

        .UserIcon {
            font-size: 1.5rem;
        }

        p {
            font-weight: 800;
            margin: 0 0 0 16px;
        }
    }

    .OptionsBox {
        display: flex;
        align-items: center;
        margin: 16px 0 0 -8px;

        button {
            font-size: 0.85;
            color: #6574cd;
            font-weight: 800;
            outline: none;
            border: 0;
            cursor: pointer;
            font-family: inherit;
            background-color: inherit;
        }
    }
}

</style>