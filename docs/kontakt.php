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
                    <button class="nav-link buttons" type="submit" name="akcja" value="zamowienie">Zamówienie</button>
                </form>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="sklepy.php">Nasze sklepy</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="kontakt.php">Kontakt</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <?php
                include_once "Klasy/Baza.php";
                $db = new Baza("localhost", "root", "", "budowabd");

                $sql = "SELECT * FROM logged_in_users";
                $pola = ["sessionId", "userId"];
                $result = strip_tags($db->select($sql, $pola));
                if ($result != "") {
                    echo("<form method='post' action='funkcje.php'>
                        <button type='submit' class='nav-lin buttons' name='akcja' value='wyloguj'>Wyloguj</button>
                        </form>");
                }
                ?>
            </li>
        </ul>
    </div>
</nav>
<main>
    <section class="container">
        <!--Section: Contact v.2-->
        <section class="mb-4">

            <h2 class="h1-responsive font-weight-bold text-center my-4">Skontaktuj się z nami!</h2>
            <p class="text-center w-responsive mx-auto mb-5">Chcesz się z nami skontaktować? Napisz do nas używając
                formularza poniżej:</p>
            <div class="row col-12">
                <!--Grid column-->
                <div class="col-md-6 text-center">
                    <ul class="list-unstyled mb-0">
                        <li><i class="fas fa-map-marker-alt fa-2x"></i>
                            <img height="30" width="30" src="img/pinezka.svg" alt="pin">
                            <p>Lubelska 157a, 00-000 Warszawa</p>
                        </li>

                        <li><i class="fas fa-phone mt-4 fa-2x"></i>
                            <img height="30" width="30" src="img/telefon.svg" alt="phone-call">
                            <p>+48 444 555 6666</p>
                        </li>

                        <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                            <img height="30" width="30" src="img/email.svg" alt="email">
                            <p>kontakt@budowa.pl</p>
                        </li>
                    </ul>
                </div>

                <!--Grid column-->
                <div class="col-md-6 mb-md-0 mb-5">
                    <form id="contact-form" name="contact-form" method="post"
                          action="mailto:sebastian.tarasiuk@pollub.edu.pl">

                        <!--Grid row col-12-->
                        <div class="row col-12">

                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="name" name="name" class="form-control">
                                    <label for="name" class="">Twoje imię</label>
                                </div>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="email" name="email" class="form-control">
                                    <label for="email" class="">Twój email</label>
                                </div>
                            </div>
                            <!--Grid column-->

                        </div>
                        <!--Grid row col-12-->

                        <!--Grid row col-12-->
                        <div class="row col-12">
                            <div class="col-md-12">
                                <div class="md-form mb-0">
                                    <input type="text" id="subject" name="subject" class="form-control">
                                    <label for="subject" class="">Temat</label>
                                </div>
                            </div>
                        </div>
                        <!--Grid row col-12-->

                        <!--Grid row col-12-->
                        <div class="row col-12">

                            <!--Grid column-->
                            <div class="col-md-12">

                                <div class="md-form">
                                    <textarea id="message" name="message" row="2"
                                              class="form-control md-textarea"></textarea>
                                    <label for="message">Wiadomość</label>
                                </div>

                            </div>
                        </div>
                        <!--Grid row col-12-->

                    </form>

                    <div class="text-center text-md-left">
                        <a class="send-button" onclick="validateForm();">Wyślij</a>
                    </div>
                    <div id="wyslane" class="status"></div>
                </div>

            </div>

        </section>
    </section>
</main>
<footer id="kontakt">Budowa.pl &copy; Sebastian Tarasiuk 2021</footer>
</body>
</html>