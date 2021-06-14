function pobierzDane(nazwaPliku) {
    const xhr = new XMLHttpRequest();
    if (xhr) {
        var url = "http://localhost:63342/BUDOWA.PL/docs/dane/" + nazwaPliku + ".txt";
        xhr.open("GET", url);
        xhr.addEventListener("readystatechange", function () {
            if (xhr.readyState === 4) {
                console.log(nazwaPliku)
                document.getElementById(nazwaPliku).innerText = xhr.responseText;
            }
        });
        xhr.send(null);
    }
}

window.onload = function () {
    pobierzDane("onas1");
    pobierzDane("onas2");
};