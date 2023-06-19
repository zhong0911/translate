$(document).ready(function () {
    $('#translate').click(function () {
        translate()
    })
});
let debug = 'off';

function translate() {
    let sourceText = $('#source').val();
    if (sourceText) {
        let sourceLanguage = $("#source-language").val();
        let targetLanguage = $("#target-language").val();
        $.post(
            'https://api.fanyi.antx.cc/api/translate/',
            {
                q: sourceText,
                from: sourceLanguage,
                to: targetLanguage
            }, function (data) {
                if (debug === 'on') console.log(JSON.stringify(data));
                let result = data['trans_result'][0]['dst'];
                $('#target').val(result)
            }, 'json'
        )
    }
}

