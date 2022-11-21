const axios = require("axios");
module.exports = async(socket, next) => {
    let token = socket.handshake.headers.token;
    let admin = await axios.post(process.env.ADMIN_URL + "/api" + "/checkToken", undefined, {
        headers: {

            Authorization: `Bearer ${token}`

        }
    }).then((res) => {

        socket.user = res.data;
        socket.user.type = 1;
        next()


    }).catch((err) => {

        axios.post(process.env.USER_URL + "/api" + "/checkToken", undefined, {
            headers: {

                Authorization: `Bearer ${token}`

            }
        }).then((res) => {

            socket.user = res.data;
            socket.user.type = 2;

            next()

        }).catch((err) => {

            next(new Error("we have error"))
        })



    })















}