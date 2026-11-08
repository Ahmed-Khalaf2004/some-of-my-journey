// const http = require("node:http2");
// exports.current = function(location, resultCallback){
//     http.request(Option, function(responce){
//         let buffer = '';
//         let result = '';
//         responce.on('data', function(chunck){
//             buffer += chunck;
//         })
//         responce.on('end',function(){
//             parseString(buffer, function(err, result){
//                 if(err){
//                     console.log(err);
//                     return;
//                 }
//                 resultCallback(null, result.current_observation.temp_f[0]);
//             })
//         })
//     })
// }

const http = require("node:https");
const { parseString } = require("xml2js");

exports.current = function (location, resultCallback) {
  const req = http.request(location, (stream) => {
    let buffer = "";
    stream.on("data", (chunk) => {
      buffer += chunk;
    });
    stream.on("end", () => {
      parseString(buffer, (err, result) => {
        if (err) return resultCallback(err);
        resultCallback(null, result.current_observation.temp_f);
      });
    });
  });
  req.on("error", resultCallback);
  req.end();
};
