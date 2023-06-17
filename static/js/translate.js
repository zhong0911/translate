$(document).ready(function () {
    $('#translate').click(function () {
        translate()
    })
});
let debug = 'off';

function translate() {
    let sourceText = $('#source').val();
    if (sourceText) {
        let appid = '20230201001546777';
        let key = 'iYHFC1L6lLNrgzdMmigW';
        let salt = (new Date).getTime();
        let sign = $.md5(appid + sourceText + salt + key);
        let sourceLanguage = $("#source-language").val();
        let targetLanguage = $("#target-language").val();
        $.ajax({
            url: 'https://api.fanyi.baidu.com/api/trans/vip/translate',
            type: 'get',
            dataType: 'jsonp',
            data: {q: sourceText, appid: appid, salt: salt, from: sourceLanguage, to: targetLanguage, sign: sign},
            success: function (data) {
                if (debug === 'on') console.log(JSON.stringify(data));
                let result = data['trans_result'][0]['dst'];
                $('#target').text(result)
            }
        })
    }
}