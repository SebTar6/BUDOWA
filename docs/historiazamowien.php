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
</nav>
<main>
    <br>
    <h1>HISTORIA ZAMÓWIEŃ</h1>
    <br>
    <?php
    include_once "Klasy/Baza.php";
    include_once "Klasy/User.php";
    include_once "Klasy/Zamowienie.php";
    include_once "Klasy/UserManager.php";
    include_once "Klasy/ZamowienieManager.php";

    $db = new Baza("localhost", "root", "", "budowabd");

    $um = new UserManager();
    $zm = new ZamowienieManager();

    $list = array('fullName' => 'Imię i nazwisko',
        'adress' => 'Ulica i numer domu',
        'postal' => 'Kod pocztowy',
        'city' => 'Miasto',
        'phone' => 'Numer telefonu',
        'email' => 'Email',
        'product' => 'Produkt',
        'amount' => 'Liczba sztuk',
        'delivery' => 'Sposób dostawy');

    if (filter_input(INPUT_POST, "akcja") == "edytuj") {
        $args = ['id' => FILTER_VALIDATE_INT];
        $dane = filter_input_array(INPUT_POST, $args);
        $id = $dane['id'];
        session_start();
        $_SESSION['id'] = $id;
        header("location:edytujzam.html");
    }
    if (filter_input(INPUT_POST, "akcja") == "usun") {
        $args = ['id' => FILTER_VALIDATE_INT];
        $dane = filter_input_array(INPUT_POST, $args);
        $id = $dane['id'];
        $sql = "DELETE FROM orders WHERE orderId=$id";
        $db->delete($sql);
        header("Refresh:0");
    }
    if(filter_input(INPUT_POST, "akcja")== "zatwierdz"){
        $args = [
            'fullName' => ['filter' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^[A-Za-ząęłńśćżźó\s]{1,}$/']],
            'adress' => ['filter' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^[A-Za-ząęłńśćżźó0-9\s.]{1,}$/']],
            'postal' => ['filter' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^[0-9]{2}[-]{1}[0-9]{3}$/']],
            'city' => ['filter' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^[A-ZĄĘŁŃŚĆŻŹÓa-ząęłńśćżźó\s]{1,}$/']],
            'phone' => ['filter' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^[0-9+\s]{1,}$/']],
            'email' => FILTER_VALIDATE_EMAIL,
            'product' => ['filter' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^[A-Za-ząęłńśćżźó0-9\s.]{1,}$/']],
            'amount' => FILTER_VALIDATE_INT,
            'delivery' => ['filter' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^[A-ZĄĘŁŃŚĆŻŹÓa-ząęłńśćżźó\s]{1,}$/']]
        ];
        $dane = filter_input_array(INPUT_POST, $args);
        $errors = "";
        foreach ($dane as $key => $val){
            if($val === false or $val === NULL){
                $errors .= $list[$key] . " ";
            }
        }
        if($errors === ""){
            session_start();
            $id = $_SESSION['id'];
            $fullName = $dane["fullName"];
            $adress = $dane["adress"];
            $postal = $dane["postal"];
            $city = $dane["city"];
            $phone = $dane["phone"];
            $email = $dane["email"];
            $product = $dane["product"];
            $amount = $dane["amount"];
            $delivery = $dane["delivery"];
            $sql = "UPDATE orders SET fullName='$fullName', adress='$adress', postal='$postal', city='$city', phone='$phone', email='$email', product='$product', amount=$amount, delivery='$delivery' WHERE orderId=$id";
            $db->insert($sql);
            header("Refresh:0");
        }
        else{
            echo "<script type='text/javascript'>alert('Błędnie podane dane: $errors');</script>";
        }
    }

    $results = $zm->pokazZam($db);
    $keys = ["Imię i nazwisko", "Ulica i numer domu", "Kod pocztowy",
        "Miasto", "Numer telefonu", "Email", "Produkt", "Liczba sztuk",
        "Sposób dostawy", "Id zamówienia"];
    $first_row = true;
    echo("<table class='table-orders'>");
    while ($row = mysqli_fetch_assoc($results)) {
        if ($first_row) {
            $first_row = false;
            echo '<tr>';
            foreach ($keys as $key) {
                echo '<th class="cells-orders">' . $key . '</th>';
            }
            echo '</tr>';
        }
        echo '<tr>';
        foreach ($row as $key => $field) {
            if($key == "userId") continue;
            echo '<td class="cells-orders">' . htmlspecialchars($field) . '</td>';
        }
        echo '</tr>';
    }
    echo("</table>");
    echo("</br>");
    echo("<div class='editNdelete'><form method='post' action='historiazamowien.php'>
            <table class='button-orders editNdelete'><tr><td>ID ZAMÓWIENIA </td></tr><tr><td><input type='text' name='id'></td></tr>
            <tr><td><button type='submit' name='akcja' class='orders-button' value='edytuj'>Edytuj</button></td></tr>
            <tr><td><button type='submit' name='akcja' class='orders-button' value='usun'>Usuń</button></form></td></td>
            </table></form></div>");
    echo("<div class='orders-button editNdelete'><a href='zamowienie.php'>Powrót</a></div>");
    echo("</br>");
    echo("</br>");
    ?>
</main>
<footer>Budowa.pl &copy; Sebastian Tarasiuk 2021</footer>
</body>
</html>
