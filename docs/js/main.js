//--kontakt--

function validateForm() {
    var name = document.getElementById('name').value;
    if (name === "") {
        document.querySelector('.status').innerHTML = "Pole z imieniem nie może być puste!";
        return false;
    }
    var email = document.getElementById('email').value;
    if (email === "") {
        document.querySelector('.status').innerHTML = "Pole z emailem nie może być puste!";
        return false;
    } else {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (!re.test(email)) {
            document.querySelector('.status').innerHTML = "Niepoprawny email!";
            return false;
        }
    }
    var subject = document.getElementById('subject').value;
    if (subject === "") {
        document.querySelector('.status').innerHTML = "Pole z tematem nie może być puste!";
        return false;
    }
    var message = document.getElementById('message').value;
    if (message === "") {
        document.querySelector('.status').innerHTML = "Pole z wiadomością nie może być puste!";
        return false;
    }
    document.querySelector('.status').innerHTML = "Wysłano &#128522;";
}

//--zamówienia--

function dodajZamowienie() {
    var item = {};
    item.imie = document.getElementById('imie').value;
    item.ulica = document.getElementById('ulica').value;
    item.kod = document.getElementById('kod').value;
    item.miasto = document.getElementById('miasto').value;
    item.telefon = document.getElementById('telefon').value;
    item.email = document.getElementById('email').value;
    item.produkt = document.getElementById('produkt').value;
    item.liczba = document.getElementById('liczba').value;
    item.data = new Date();
    var lista = JSON.parse(localStorage.getItem('lista'));
    if (lista === null) lista = [];
    lista.push(item);
    localStorage.setItem('lista', JSON.stringify(lista));
}

function pokazListe() {
    var lista = JSON.parse(localStorage.getItem('lista'));
    var el = document.getElementById('zamowienia');
    var str = "<hr><h1>Twoja lista zamówień: </h1>";
    if (lista === null) el.innerHTML = str + "<p>Pusta lista zamówień</p>";
    else {
        for (i = 0; i < lista.length; i++) {
            str += "<h3>Zamówienie z dnia " + lista[i].data + ":</h3>";
            str += "Imię i nazwisko: " + lista[i].imie + "<br>";
            str += "Ulica: " + lista[i].ulica + "<br>";
            str += "Kod pocztowy: " + lista[i].kod + "<br>";
            str += "Miasto: " + lista[i].miasto + "<br>";
            str += "Telefon: " + lista[i].telefon + "<br>";
            str += "Email: " + lista[i].email + "<br>";
            str += "Produkt: " + lista[i].produkt + "<br>";
            str += "Liczba sztuk: " + lista[i].liczba + "<br>";
            str += "<button class='' type='button' onclick='usunZamowienie(" + i + ")' >Usuń</button>";
            str += "<button class='' type='button' onclick='edycja(" + i + ")'>Edytuj</button>";
            str += "<br><hr style='width: 40%;'>";
        }
    }
    el.innerHTML = str;
}

function usunListe() {
    if (confirm("Usunąć listę zamówień?")) {
        localStorage.removeItem('lista');
        //zaktualizuj widok na stronie
        $('#zamowienia').html('');
    }
}

function usunZamowienie(i) {
    var lista = JSON.parse(localStorage.getItem('lista'));
    if (confirm("Usunąć zamówienie?")) lista.splice(i, 1);
    localStorage.setItem('lista', JSON.stringify(lista));
    pokazListe();
}