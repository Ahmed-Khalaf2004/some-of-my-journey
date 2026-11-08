let http = require("http");
let options = {
  host: "w1.wheather.gov",
  path: "xml/current_pos/KSFO.xml",
};
// console.log("Tessssssstttt");
http.request(options, function (responce) {
  let buffer = "";
  let result = "";
  responce.on("data", function (chunck) {
    buffer += chunck;
  });
  responce.on("end", function () {
    console.log(buffer);
  });
}).end();
