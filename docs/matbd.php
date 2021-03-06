<!DOCTYPE html>
<html lang="pl">
<head>
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
            <li class="nav-item active dropdown">
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
                    <button class="nav-link buttons" type="submit" name="akcja" value="zamowienie">Zamówienie</button>
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
                ?>
            </li>
        </ul>
    </div>
</nav>
<h1>MATERIAŁY BUDOWLANE</h1>
<div class="row col-12 text-center">
    <div class="col-md-6 col-xl-4 p-5">
        <h2>KOSTKA BRUKOWA</h2><br>
        <img src="img/kostka.png" class="materialy" alt="">
        <p class="text-justify p-5">Kostka brukowa szara ma charakterystyczne, zaokrąglone krawędzie i naroża, wąskie
            zamknięcie spoin oraz gładką powierzchnię licową. Pozwala to na układanie z niej różnego rodzaju wzorów, jak
            rozety, pierścienie, łuki itp. Jest wykonana z wysokiej jakości betonu, cechującego się dużą odpornością na
            niskie temperatury oraz ścieranie. Dzięki połączeniu jej z kostkami w innych kolorach, jak np. kostka
            brukowa czerwona czy kostka brukowa czarna, można tworzyć estetyczne aranżacje.</p>
    </div>
    <div class="col-md-6 col-xl-4 p-5">
        <h2>CEMENT</h2><br>
        <img src="img/cement.png" class="materialy" alt="">
        <p class="text-justify p-5">Nasz cement jest idealny do wszystkich prac budowlanych. Można z niego wykonywać
            beton przeznaczony na ławy fundamentowe. Idealnie nadaje się także do produkcji zapraw, podsypek pod
            nawierzchnie z kostki brukowej, a także stabilizacji gruntów i produkcji tzw. "chudych betonów". To
            nieodzowne spoiwo do drobnych prac remontowych i naprawczych w Państwa domach. Wykonane z naszego cementu
            betony i zaprawy charakteryzują się podwyższoną odpornością na działanie środowisk agresywnych
            chemicznie.</p>
    </div>
    <div class="col-md-6 col-xl-4 p-5">
        <h2>PŁYTKI</h2><br>
        <img src="img/płytka.png" class="materialy" alt="">
        <p class="text-justify p-5">Płytka klinkierow col-12a przeznaczona do wewnątrz i na zewnątrz pomieszczeń do położenia
            na podłogach lub schodach. Posiada właściwości mrozoodporne. Ze względu na wysoką klasę ścieralności
            idealnie nadaje się do wszystkich pomieszczeń mieszkalnych oraz użyteczności publicznej (z wyłączeniem
            miejsc o szczególnym natężeniu ruchu). Współczynnik antypoślizgowości R9.</p>
    </div>
    <div class="col-md-6 col-xl-4 p-5">
        <h2>PANELE PODŁOGOWE</h2><br>
        <img src="img/panele.png" class="materialy" alt="">
        <p class="text-justify p-5">Jest to wysokiej jakości panel podłogowy o klasie ścieralności AC 3 oznaczającą
            dobrą odporność na ścieranie czy uderzenia. Przeznaczony jest do pomieszczeń mieszkalnych oraz do
            pomieszczeń użyteczności publicznej o niskim natężeniu ruchu, np. małe biuro, butik.
            Struktura drewna sprawia, że ułożona podłoga odzwierciedla wygląd desek parkietowych.
            Dzięki bezklejowemu systemowi łączenia, montaż przebiega szybko i bezproblemowo.</p>
    </div>
    <div class="col-md-6 col-xl-4 p-5">
        <h2>KLEJ</h2><br>
        <img src="img/klej.png" class="materialy" alt="">
        <p class="text-justify p-5">Klej błyskawiczny jest wykonany z kauczuku i dodatkowo wzmocniony
            włóknami syntetycznymi, co daje mu wysoką siłę spojenia. Zapewnia trwałe i wodoodporne łączenie. Trzyma już
            po 1 sekundzie od dociśnięcia, natomiast pełne utwardzenie kleju następuje po 24 godzinach. Może być
            stosowany do uzupełniania ubytków w podłożu. Przeznaczony do użytku zarówno w pomieszczeniach, jak i na
            zewnątrz.</p>
    </div>
    <div class="col-md-6 col-xl-4 p-5">
        <h2>SZTACHETY</h2><br>
        <img src="img/sztachety.png" class="materialy" alt="">
        <p class="text-justify p-5">Nasz płot sztachetowy, staranne wykończenie oraz estetyczny wygląd czynią go
            niezastąpionym dla typowych zastosowań podczas tworzenia aranżacji na działce lub ogrodzie. Wykonany z
            drewna sosnowego poddanego procesowi impregnacji ciśnieniowej, która zabezpiecza go przed szkodliwym
            działaniem czynników atmosferycznych.</p>
    </div>
</div>
<footer>Budowa.pl &copy; Sebastian Tarasiuk 2021</footer>
</body>
</html>