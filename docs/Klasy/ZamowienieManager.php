<?php
include_once "Baza.php";

class ZamowienieManager
{
    function dodajZam($db)
    {
        $list = array('fullName' => 'Imię i nazwisko',
            'adress' => 'Ulica i numer domu',
            'postal' => 'Kod pocztowy',
            'city' => 'Miasto',
            'phone' => 'Numer telefonu',
            'email' => 'Email',
            'product' => 'Produkt',
            'amount' => 'Liczba sztuk',
            'delivery' => 'Sposób dostawy');

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
            $fullName = $dane["fullName"];
            $adress = $dane["adress"];
            $postal = $dane["postal"];
            $city = $dane["city"];
            $phone = $dane["phone"];
            $email = $dane["email"];
            $product = $dane["product"];
            $amount = $dane["amount"];
            $delivery = $dane["delivery"];
            $userId = $this->userId($db);
            $sql = "INSERT INTO orders (fullName, adress, postal, city, phone, email, product, amount, delivery, userId) VALUES ('$fullName', '$adress', '$postal', '$city', '$phone', '$email', '$product', $amount, '$delivery', $userId)";
            $db->insert($sql);
        }
        else{
            session_start();
            $_SESSION['errors'] = $errors;
        }
    }

    function usunZam($db)
    {
        session_start();
        $id = session_id();
        if (filter_input(INPUT_COOKIE, session_name())) {
            setcookie(session_name(), '', time() - 42000, '/');
        }
        session_destroy();
        $db->delete("DELETE FROM logged_in_users WHERE sessionId='$id'");
    }

    function pokazZam($db){
        $userId = $this->userId($db);
        $sql = "SELECT * FROM orders WHERE userId=$userId";
        return $db->selectOrders($sql);
    }

    function userId($db){
        session_start();
        $sessionId = session_id();
        $sql = "SELECT userId FROM logged_in_users WHERE sessionId='$sessionId'";
        return $db->getUserId($sql);
    }
}