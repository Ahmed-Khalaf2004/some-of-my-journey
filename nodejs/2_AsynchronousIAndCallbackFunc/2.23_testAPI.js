// at console:
// const weather = require("./2.22_weather");
// weather.current("Gaza", (err, data) => {
//   if (err) {
//     console.error("حدث خطأ:", err.message);
//     return;
//   }
//   console.log(`🌤️ درجة الحرارة في غزة: ${data.tempC}°م`);
//   console.log(`الوصف: ${data.description}`);
//   console.log(`الرطوبة: ${data.humidity}%`);
// });

// at browser:
const http = require("node:http");
const weather = require("./2.22_weather");

const server = http.createServer((req, res) => {
  // نأخذ اسم المدينة من الرابط، مثلاً: localhost:3000/?city=Gaza
  const url = new URL(req.url, `http://${req.headers.host}`);
  const city = url.searchParams.get("city") || "Gaza";

  weather.current(city, (err, data) => {
    if (err) {
      res.writeHead(500, { "Content-Type": "text/plain; charset=utf-8" });
      res.end("حدث خطأ في جلب البيانات");
      return;
    }

    // أهم سطر: charset=utf-8 حتى تظهر العربية بشكل صحيح في المتصفح
    res.writeHead(200, { "Content-Type": "text/html; charset=utf-8" });
    res.end(`
            <!DOCTYPE html>
            <html dir="rtl" lang="ar">
            <head>
                <meta charset="UTF-8">
                <title>حالة الطقس</title>
                <style>
                    body {
                        font-family: 'Segoe UI', Tahoma, sans-serif;
                        background: linear-gradient(135deg, #667eea, #764ba2);
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        height: 100vh;
                        margin: 0;
                    }
                    .card {
                        background: white;
                        padding: 40px;
                        border-radius: 20px;
                        box-shadow: 0 10px 40px rgba(0,0,0,0.3);
                        text-align: center;
                        min-width: 300px;
                    }
                    .temp { font-size: 60px; font-weight: bold; color: #667eea; }
                    .desc { font-size: 24px; color: #555; margin: 15px 0; }
                    .hum { color: #888; }
                </style>
            </head>
            <body>
                <div class="card">
                    <h1>🌍 حالة الطقس في ${city}</h1>
                    <div class="temp">${data.tempC}°م</div>
                    <div class="desc">${data.description}</div>
                    <div class="hum">💧 الرطوبة: ${data.humidity}%</div>
                </div>
            </body>
            </html>
        `);
  });
});

server.listen(3000, () => {
  console.log("✅ الخادم يعمل على: http://localhost:3000");
});
