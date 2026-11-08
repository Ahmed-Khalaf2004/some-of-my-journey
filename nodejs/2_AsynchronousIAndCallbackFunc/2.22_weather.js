const { error } = require("node:console");
const https = require("node:https");
exports.current = function (location, resultCallback) {
  const url = `https://wttr.in/${encodeURIComponent(location)}?format=j1`;
  https
    .get(url, (res) => {
      let buffer = "";
      let result = "";
      res.on("data", (chunck) => {
        buffer += chunck;
      });
      res.on("end", () => {
        try {
          const data = JSON.parse(buffer);
          const current = data.current_condition[0];
          resultCallback(null, {
            tempC: current.temp_C, // درجة الحرارة بالمئوية
            tempF: current.temp_F, // درجة الحرارة بالفهرنهايت
            description:
              current.lang_ar?.[0]?.value || current.weatherDesc[0].value,
            humidity: current.humidity, // الرطوبة
          });
        } catch (err) {
          resultCallback(err);
        }
      });
    })
    .on("error", resultCallback);
};
