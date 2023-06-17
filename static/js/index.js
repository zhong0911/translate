$(document).ready(function () {
    $("#source-language").change(function () {
        selectSourceLanguage();
    });

    $("#target-language").change(function () {
        selectTargetLanguage();
    });

    $("#source").keyup(function () {
        checkSourceText();
    });
});


function checkSourceText() {
    let sourceText = $("#source").val();
    if (!sourceText) $("#target").val('');
}

function selectSourceLanguage() {
    let sourceLanguage = $("#source-language").val();
    let targetLanguage = $("#target-language").val();
    if (sourceLanguage === targetLanguage) {
        let selected;
        switch (sourceLanguage) {
            case "zh" : {
                selected = 'en';
                break;
            }
            case "en" : {
                selected = 'zh';
                break;
            }
            default: {
                refresh();
            }
        }
        $("#target-language").val(selected);
    }
}

function selectTargetLanguage() {
    let sourceLanguage = $("#source-language").val();
    let targetLanguage = $("#target-language").val();
    if (sourceLanguage === targetLanguage) {
        let selected;
        switch (targetLanguage) {
            case "en" : {
                selected = 'zh';
                break;
            }
            case "zh" : {
                selected = 'en';
                break;
            }
            default: {
                refresh();
            }
        }
        $("#source-language").val(selected);
    }
}