var mysql = require('mysql');

var con = mysql.createConnection({
  host: "localhost:3306",
  user: "sunshine",
  password: "Test123!",
  database: "OS"
});

con.connect(function(err) {
  if (err) throw err;
  console.log("Connected!");
});
