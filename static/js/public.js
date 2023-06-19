// let host = $.url.attr("host");
// if (!(host === "translate.antx.cc" || host === "fanyi.antx.cc" || host === "localhost")) {
//     into("https://translate.antx.cc/" + $.url.attr("path"));
// } else {
//     $.post('https://api.antx.cc/api/myaddr/', function (data) {
//         if (data['country'] === '中国') {
//             into('https://fanyi.antx.cc')
//         } else {
//             into('https://translate.antx.cc')
//         }
//     })
// }