const axios = require("axios");
module.exports = (socket, next) => {
    let token = socket.handshake.headers.token;
    axios.post(process.env.ADMIN_URL + "/api" + "/checkToken", undefined, {
        headers: {

            Authorization: `Bearer ${token}`

        }
    }).then((res) => {

        socket.user = res.data;
        next()

    })

    axios.post(process.env.USER_URL + "/api" + "/checkToken", undefined, {
        headers: {

            Authorization: `Bearer ${token}`

        }
    }).then((res) => {

        socket.user = res.data;
        next()

    })













}