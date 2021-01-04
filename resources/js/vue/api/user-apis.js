import Axios from 'axios'

class userApis {

    static async signupUserHandler (name, email, pw) {

        const { data } = await Axios.post('/api/users', {
            name: name,
            email: email,
            password: pw
        }, { headers: {
            'Content-Type': 'application/json'
        }});
        return console.log(data);
    }

}

export default userApis;