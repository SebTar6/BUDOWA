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
    var lista = JSON.parse(localStorage.getItem('lista'));
    if (lista === null) lista = [];
    lista.push(item);
    localStorage.setItem('lista', JSON.stringify(lista));
}