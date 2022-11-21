const { default: axios } = require("axios");
const db = require("../util/database");

class User {


    async getCountUserById(id) {


        let count;
        let arr = [];
        arr["id"] = id;
        return await axios.post(process.env.URL_URL + "/api/getusercount", arr).then((res) => {

            count = JSON.parse(res);
            return count;


        }).catch((error) => {

            throw new Error(error.message)


        })

    }

}

const userModel = new User();

module.exports = userModel;