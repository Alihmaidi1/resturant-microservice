const mysql = require("mysql2");

const pool = mysql.createPool({

    host: "localhost",
    user: "root",
    password: "ali450892",
    database: "resturant_admin",
    port: 33076


})



module.exports = pool.promise()