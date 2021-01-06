const userModule = {
    state: () => ({
        sessionUser: { name: '', email: '' }, // should be set to the user object, whether user or restaurant
        userType: '', // should be either 'consumer' or 'restaurant'
        auth: 'unauth' // should be 'auth' or 'unauth'. Is used for determening which sidebar menu to show
    }),
    mutations: {
        setSessionUser(state, payload) {
            state.sessionUser = payload;
        },
        userType(state, payload) {
            state.userType = payload;
        },
        isAuth(state) {
            state.auth = 'auth';
        },
        isUnauth(state) {
            state.auth = 'unauth';
        }
    }
}

export default userModule;