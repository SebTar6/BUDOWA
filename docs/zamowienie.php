<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include_once "Klasy/Baza.php";
    $db = new Baza("localhost", "root", "", "budowabd");

    $sql = "SELECT * FROM logged_in_users";
    $pola = ["sessionId","userId"];
    $result = strip_tags($db->select($sql,$pola));
    if($result == ""){
        http_response_code(404);
        die();
    }
    ?>
    <meta charset="UTF-8">
    <title>Budowa.pl - sklep z narzędziami</title>
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
            crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</head>
<body>
<nav class="navbar sticky-top nav-settings navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand pr-5" href="#"><img src="img/logonavbar.png" class="pr-2" alt="">BUDOWA.PL</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Start</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Oferta
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="matbd.php">Materiały budowlane</a>
                    <a class="dropdown-item" href="narzduze.php">Narzędzia duże</a>
                    <a class="dropdown-item" href="narzmale.php">Narzędzia małe</a>
                </div>
            </li>
            <li class="nav-item">
                <form method="post" action="funkcje.php">
                    <button class="nav-link buttons active" type="submit" name="akcja" value="zamowienie">Zamówienie</button>
                </form>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="sklepy.php">Nasze sklepy</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="kontakt.php">Kontakt</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <?php
                include_once "Klasy/Baza.php";
                $db = new Baza("localhost", "root", "", "budowabd");

                $sql = "SELECT * FROM logged_in_users";
                $pola = ["sessionId","userId"];
                $result = strip_tags($db->select($sql,$pola));
                if($result != ""){
                    echo("<form method='post' action='funkcje.php'>
                    <button type='submit' class='nav-link buttons' name='akcja' value='wyloguj'>Wyloguj</button>
                    </form>");
                }
                session_start();
                if(isset($_SESSION['errors'])){
                    if($_SESSION['errors'] != ""){
                        $errors = $_SESSION['errors'];
                        echo "<script type='text/javascript'>alert('Błędnie podane dane: $errors');</script>";
                        $_SESSION['errors'] = "";
                    }
                }
                ?>
            </li>
        </ul>
    </div>
</nav>
<main>
    <br>
    <h1>TUTAJ ZŁOŻYSZ ZAMÓWIENIE</h1>
    <div class="row col-12 pb-5">
        <div class="col-md-6">
            <form method="post" action="funkcje.php">
                <table class="table text-center">
                    <tbody>
                    <tr>
                        <td>Imię i nazwisko:</td>
                        <td><input type="text" id="imie" name="fullName" required></td>
                    </tr>
                    <tr>
                        <td>Ulica i numer domu:</td>
                        <td><input type="text" id="ulica" name="adress" required></td>
                    </tr>
                    <tr>
                        <td>Kod pocztowy:</td>
                        <td><input type="text" id="kod" name="postal" required></td>
                    </tr>
                    <tr>
                        <td>Miasto:</td>
                        <td><input type="text" id="miasto" name="city" required></td>
                    </tr>
                    <tr>
                        <td>Numer telefonu:</td>
                        <td><input type="tel" id="telefon" name="phone" required></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input type="email" id="email" name="email" required></td>
                    </tr>
                    <tr>
                        <td>Produkt:</td>
                        <td>
                            <select id="produkt" name="product">
                                <option value="Kostka brukowa">Kostka brukowa</option>
                                <option value="Cement">Cement</option>
                                <option value="Płytki">Płytki</option>
                                <option value="Panele podłogowe">Panele podłogowe</option>
                                <option value="Klej">Klej</option>
                                <option value="Sztachety">Sztachety</option>
                                <option value="Siekiera">Siekiera</option>
                                <option value="Łopata">Łopata</option>
                                <option value="Grabie">Grabie</option>
                                <option value="Kosiarka spalinowa">Kosiarka spalinowa</option>
                                <option value="Piła spalinowa">Piła spalinowa</option>
                                <option value="Dmuchawa do liści">Dmuchawa do liści</option>
                                <option value="Młotek">Młotek</option>
                                <option value="Multitool">Multitool</option>
                                <option value="Wiertarka">Wiertarka</option>
                                <option value="Klucz francuski">Klucz francuski</option>
                                <option value="Szlifierka">Szlifierka</option>
                                <option value="Latarka">Latarka</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Liczba sztuk:</td>
                        <td><input type="number" id="liczba" name="amount" required></td>
                    </tr>
                    <tr>
                        <td>Sposób dostawy:</td>
                        <td><input type="radio" name="delivery" value="Odbiór osobisty" checked="checked"> Odbiór osobisty<br>
                            <input type="radio" name="delivery" value="Wysyłka"> Wysyłka
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="text-center">
                    <button type="submit" class="button-add" name="akcja" value="dodaj">Zamów</button>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <p>Zadzwoń do nas i zamów produkty, których potrzebujesz.
                Nie jesteś zdecydowany na konkretny produkt? Pomożemy Ci go wybrać.
                Skorzystaj z szybkich i wygodnych zakupów przez telefon.
                Zamawiaj wymarzone produkty wygodnie online, a my zadbamy o dostarczenie ich jeszcze tego samego dnia.
            </p>
        </div>
    </div>
    <div class="text-center p-5">
        <form method="post" action="historiazamowien.php">
            <button type="submit" class="orders-button" name="akcja" value="pokaz">POKAŻ ZAMÓWIENIA</button>
        </form>
        <form method="post" action="funkcje.php">
            <button type="submit" class="orders-button" name="akcja" value="usun">USUŃ LISTĘ ZAMÓWIEŃ</button>
        </form>
    </div>
    <section class="px-5 text-center" id="zamowienia"></section>
</main>
<footer>Budowa.pl &copy; Sebastian Tarasiuk 2021</footer>
</body>
</html>