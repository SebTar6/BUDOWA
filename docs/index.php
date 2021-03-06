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
    <script src="js/xhrjs.js"></script>

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
            <li class="nav-item active">
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
    </div>
</nav>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="img/slider1.png" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="img/slider2.png" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="img/slider3.png" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<main>
    <br>
    <h1>O NAS</h1>
    <br>
    <div class="row col-12">
        <div class="col-md-6 px-5"><p id="onas1" class="text-justify"></p>
        </div>
        <div class="col-md-6 px-5"><p id="onas2" class="text-justify"></p>
        </div>
    </div>
    <hr>
    <br>
    <h1>NASI PARTNERZY</h1>
    <div class="row col-12 text-center">
        <div class="col-md-6 col-lg-4 p-5">
            <a href="https://concept-house.com.pl/wylewki-betonowe?gclid=CjwKCAjw_JuGBhBkEiwA1xmbRXtrTVslm66738HdQaiKmA11pWdI5dz_yxDxU5Am_BQzpAKn7lvxkBoCsRYQAvD_BwE"
               target="_blank"><img src="img/firma1.png" class="partner" alt=""></a>
            <p class="text-justify p-5">Jednymi z naszych flagowych usług są wylewki betonowe i anhydrytowe wykonywane
                przy użyciu najnowocześniejszych technologii i sprzętu. Dzięki wieloletniemu doświadczeniu wykonywane
                przez nas rozlewki jastrychu są trwałe i posiadają doskonałe parametry odporności. Bez względu na to czy
                posadzka ma być podłożem do różnego rodzaju okładzin podłogowych, czy finalną podłogą nasza praca
                przynosi efekty satysfakcjonujące najbardziej wymagających klientów.</p>
        </div>
        <div class="col-md-6 col-lg-4 p-5">
            <a href="https://livingroof.pl/?gclid=CjwKCAjw_JuGBhBkEiwA1xmbRU1u50B2rOjkkX4Ifq8JemujHzvfYGfHpoyKkOG_K35rMjY1l05BABoCq-kQAvD_BwE"
               target="_blank"><img src="img/firma2.png" class="partner" alt=""></a>
            <p class="text-justify p-5">Jesteśmy pasjonatami rzeczy pięknych, ale niebanalnych. W tworzeniu i
                aranżowaniu przestrzeni stawiamy na funkcjonalność, personalizację i nowoczesny design. Wieloletnie
                doświadczenie w pracy projektowej nauczyło nas dostrzegać rzeczy nieoczywiste i myśleć
                niekonwencjonalnie, poza schematem.</p>
        </div>
        <div class="col-md-6 col-lg-4 p-5">
            <a href="https://completehome.pl/?gclid=CjwKCAjw_JuGBhBkEiwA1xmbReSvyU30A0H-kQMixDEiReqnefQ3g38LLNpbguAx6r76zRW9xtR2URoCw_QQAvD_BwE"
               target="_blank"><img src="img/firma3.png" class="partner" alt=""></a>
            <p class="text-justify p-5">Firma Complete Home oferuje szeroki zakres usług wykończeniowych i remontowych.
                Dla naszych fachowców nie ma rzeczy niemożliwych! Od lat współpracujemy z osobami, których atutem jest
                wieloletnie doświadczenie w branży budowlanej. Nasze ekipy wykonują kompleksowe remonty mieszkań w
                Warszawie od lat. Wysokojakościowe usługi naszych ekspertów doceniają osoby reprezentujące starsze i
                młodsze pokolenia mieszkańców Warszawy.</p>
        </div>
        <div class="col-md-6 col-lg-4 p-5">
            <a href="http://stolarniawawer.pl/" target="_blank"><img src="img/firma4.png" class="partner" alt=""></a>
            <p class="text-justify p-5">Lata pracy z drewnem nauczyły nas pokory i cierpliwości. Drewno to wymagający
                lecz niezwykle wdzięczny materiał. Chcemy dzielić się zdobytym doświadczeniem i pasją z naszymi
                klientami. Każda realizacja, to najlepsza reklama, która jest jednocześnie wizytówką naszej
                rzemieślniczej pracy. Zapraszamy z Państwa pomysłami do Stolarnia Warszawa.
            </p>
        </div>
        <div class="col-md-6 col-lg-4 p-5">
            <a href="https://www.kruszbruk.pl/" target="_blank"><img src="img/firma5.png" class="partner" alt=""></a>
            <p class="text-justify p-5">Świadczymy szeroki zakres usług, za pomocą których pomagamy klientom w uzyskaniu
                najlepszych rozwiązań jeśli chodzi o budowę dróg, podjazdów czy parkingów. Brukarstwo to nasza pasja, a
                zatrudnieni w naszej firmie pracownicy posiadają doświadczenie i umiejętności, dzięki którym jesteśmy
                jednym z liderów w tej dziedzinie. Doskonale wiemy, że klientom zależy także na materiałach wysokiej
                jakości, dlatego do naszych pracy wykorzystywana jest solidna i wytrzymała kostka brukowa.</p>
        </div>
        <div class="col-md-6 col-lg-4 p-5">
            <a href="https://maosil.pl/" target="_blank"><img src="img/firma6.png" class="partner" alt=""></a>
            <p class="text-justify p-5">Dzięki naszym usługom możliwe jest odświeżenie wyglądu przestrzeni, w której
                przebywamy codziennie! Nasze rozwiązania kierujemy do firm, które chcą skorzystać profesjonalnych
                rozwiązań, jeśli chodzi o malowanie salonu, biura, firmy oraz hali lub magazynu. Niezależnie, czy
                konieczne jest zadbanie o nowoczesne przestrzenie, czy może o wielkie sale produkcyjne, w których
                wykonuje się skomplikowane procedury – jesteśmy pewni, że nasze możliwości spotkają się z aprobatą.</p>
        </div>
    </div>
    <hr>
    <br>
    <h1>JAK WYTWARZANE SĄ NASZE NARZĘDZIA?</h1>
    <div id="filmy" class="row col-12 p-5">
        <div class="col-xl-6 embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/gEdoG6jfpy8"
                    title="YouTube video player"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
        </div>
        <div class="col-xl-6 embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/cHlfJDKPUXQ"
                    title="YouTube video player"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
        </div>
    </div>
</main>
<footer>Budowa.pl &copy; Sebastian Tarasiuk 2021</footer>
</body>
</html>
