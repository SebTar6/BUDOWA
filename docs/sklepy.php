<!DOCTYPE html>
<html lang="en">
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
            <li class="nav-item active">
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
<main>
    <br>
    <br>
    <h1>ODZIAŁ W LUBLINIE</h1>
    <div class="row col-12 p-5">
        <div class="col-md-6">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
            industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
            scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into
            electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of
            Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like
            Aldus PageMaker including versions of Lorem Ipsum.
            Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical
            Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at
            Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem
            Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable
            source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes
            of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular
            during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in
            section 1.10.32.
            <br><br>
            <img height="15" width="15" src="img/telefon.svg" alt="phone-call">  +48 111 222 333
            <br>
            <img height="15" width="15" src="img/email.svg" alt="phone-call">  kontakt-lublin@budowa.pl
            <br>
        </div>
        <div class="col-md-6 embed-responsive-item">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19979.283841345696!2d22.57354799509799!3d51.248351156794925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9a45b83f92a58f91!2sLeroy%20Merlin%20Lublin%20C.H.%20Olimp!5e0!3m2!1spl!2spl!4v1623665052289!5m2!1spl!2spl"
                    style="border:0; width: 100%; height: 400px;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
    <hr>
    <h1>ODZIAŁ W WARSZAWIE</h1>
    <div class="row col-12 p-5">
        <div class="col-md-6">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
            industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
            scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into
            electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of
            Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like
            Aldus PageMaker including versions of Lorem Ipsum.
            Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical
            Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at
            Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem
            Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable
            source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes
            of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular
            during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in
            section 1.10.32.
            <br><br>
            <img height="15" width="15" src="img/telefon.svg" alt="phone-call">  +48 444 555 666
            <br>
            <img height="15" width="15" src="img/email.svg" alt="phone-call">  kontakt-warszawa@budowa.pl
            <br>
        </div>
        <div class="col-md-6 embed-responsive-item">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9761.225651813686!2d21.008082628257657!3d52.29229277423808!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471ec944c5ef210f%3A0xf8193a0fd518b1ee!2sLeroy%20Merlin%20Warszawa%20Bia%C5%82o%C5%82%C4%99ka!5e0!3m2!1spl!2spl!4v1623664998209!5m2!1spl!2spl"
                    style="border:0; width: 100%; height: 400px;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
    <hr>
    <h1>ODZIAŁ WE WROCŁAWIU</h1>
    <div class="row col-12 p-5">
        <div class="col-md-6">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
            industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
            scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into
            electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of
            Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like
            Aldus PageMaker including versions of Lorem Ipsum.
            Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical
            Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at
            Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem
            Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable
            source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes
            of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular
            during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in
            section 1.10.32.
            <br><br>
            <img height="15" width="15" src="img/telefon.svg" alt="phone-call">  +48 777 888 999
            <br>
            <img height="15" width="15" src="img/email.svg" alt="phone-call">  kontakt-wrocław@budowa.pl
            <br>
        </div>
        <div class="col-md-6 embed-responsive-item">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2506.012379355609!2d17.06037201596068!3d51.08977904897184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470fc2926db13713%3A0x6e7fd3aeecf0bac2!2sLeroy%20Merlin%20Wroc%C5%82aw%20Krakowska!5e0!3m2!1spl!2spl!4v1623665134000!5m2!1spl!2spl"
                    style="border:0; width: 100%; height: 400px;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</main>
<footer>Budowa.pl &copy; Sebastian Tarasiuk 2021</footer>
</body>
</html>