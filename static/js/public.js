let host = $.url.attr("host");
if (!(host === "translate.antx.cc" || host === "localhost"))
    into("https://translate.antx.cc" + $.url.attr("path"));