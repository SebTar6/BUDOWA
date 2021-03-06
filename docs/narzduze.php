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
<h1>NARZĘDZIA DUŻE</h1>
<div class="row col-12 text-center">
    <div class="col-md-6 col-xl-4 p-5">
        <h2>SIEKIERA</h2><br>
        <img src="img/siekiera.jpg" class="materialy" alt="">
        <p class="text-justify p-5">Ostrze w kształcie klina oraz idealne wyważenie zapewniają wysoki komfort pracy.
            Trzonek został wykonany z lekkiego i bardzo wytrzymałego tworzywa FiberComp, będącego kompozytem włókna
            szklanego. Zapewnia to niewielką wagę przy bardzo wysokiej wytrzymałości materiału.
            Antypoślizgowa rączka wykonana z tworzywa SoftGrip zapewnia wygodę i bezpieczeństwo użytkowania.</p>
    </div>
    <div class="col-md-6 col-xl-4 p-5">
        <h2>ŁOPATA</h2><br>
        <img src="img/łopata.jpg" class="materialy" alt="">
        <p class="text-justify p-5">Łopata o pogrubionej górnej krawędzi chroniącej obuwie. Przeznaczona głównie do prac
            ogrodniczych (kopania krządek, wykonywania wykopów itp.). Osadzona na trzonku prostym T z jesionowego
            drewna, o długości 85 cm.
            Łyżka wykonana jest ze stali. Wymiary łyżki: długość - 17,5 cm, szerokość - 11,3 cm, grubość - 0,2 cm.
            Na końcu trzonka znajduje się prostopadły uchwyt w kształcie litery T, ułatwiający pracę.</p>
    </div>
    <div class="col-md-6 col-xl-4 p-5">
        <h2>GRABIE</h2><br>
        <img src="img/grabie.jpg" class="materialy" alt="">
        <p class="text-justify p-5">Grabie do liści to narzędzie przydatne w ogrodzie, szczególnie w czasie
            jesiennych porządków. Wysokiej jakości grabie ułatwiają pracę, wpływając na jej płynność i efektywność.
            Trzonek grabi jest wykonany z wyselekcjonowanego drewna. Głowica z wytrzymałego tworzywa ma ergonomiczny
            kształt i płaskie zęby. Ten rodzaj zębów zapobiega wbijaniu się w liście.
            Grabie posiadają optymalną długość trzonka i szeroką głowicę. Są wykonane z bardzo wytrzymałych
            materiałów, dzięki czemu z powodzeniem posłużą w ogrodzie przez wiele sezonów.</p>
    </div>
    <div class="col-md-6 col-xl-4 p-5">
        <h2>KOSIARKA SPALINOWA</h2><br>
        <img src="img/kosiarka.jpg" class="materialy" alt="">
        <p class="text-justify p-5">Kosiarka spalinowa z napędem. Wyposażona w silnik serii 300, Briggs&Stratton 125 cc,
            6,1 Nm/2600 obr. Szerokość robocza: 41 cm, kosz siatkowy 40L, wyrzut boczny, centralna regulacja wysokości
            (7) 25-75 mm, koła 15/20 cm, obudowa stalowa. Świetnie łączy w sobie wysoką użyteczność oraz jakość
            wykonania, zapewniając trawnikowi właściwą pielęgnację.</p>
    </div>
    <div class="col-md-6 col-xl-4 p-5">
        <h2>PIŁA SPALINOWA</h2><br>
        <img src="img/piła.jpg" class="materialy" alt="">
        <p class="text-justify p-5">Jest to kompaktowy model, który świetnie sprawdzi się przy drobnych pracach
            przydomowych, takich jak podcinanie gałęzi czy cięcie drewna na opał.
            Wyposażona system antywibracyjny, co znacznie zwiększa komfort pracy.
            Posiada system automatycznego smarow col-12ania łańcucha.
            Pojemność silnika: 41 cm3.
            Niewielkie wymiary umożliwiają wygodną pracę, zaś wysoka jakość wykonania zapewnia długą i trwałą
            eksploatację urządzenia.</p>
    </div>
    <div class="col-md-6 col-xl-4 p-5">
        <h2>DMUCHAWA DO LIŚCI</h2><br>
        <img src="img/dmuchawa.jpg" class="materialy" alt="">
        <p class="text-justify p-5">Urządzenie umożliwia swobodną pracę bez przewodów, dzięki zasilaniu akumulatorow col-12ym.
            Lekka konstrukcja: komfortowa praca dzięki ergonomicznemu kształtowi oraz niewielkiej wadze. Pełna moc:
            prędkość nadmuchu 210 km/h pozwala szybko uprzątnąć liście z ogrodu i dziedzińca. Akumulatorow col-12a dmuchawa do
            liści zapewnia swobodę pracy w dowolnym miejscu. Oszczędność miejsca w trakcie przechowywania dzięki
            zdejmowanej dyszy.</p>
    </div>
</div>
<footer>Budowa.pl &copy; Sebastian Tarasiuk 2021</footer>
</body>
</html>