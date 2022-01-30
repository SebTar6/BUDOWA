<?php
include_once "Klasy/Baza.php";
include_once "Klasy/User.php";
include_once "Klasy/Zamowienie.php";
include_once "Klasy/UserManager.php";
include_once "Klasy/ZamowienieManager.php";

$db = new Baza("localhost", "root", "", "budowabd");

$um = new UserManager();
$zm = new ZamowienieManager();

if(filter_input(INPUT_POST, "akcja")=="wyloguj"){
    $um->logout($db);
    if (endsWith($_SERVER['HTTP_REFERER'], "zamowienie.php")){
        header("location:logrej.php");
    }
    else{
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

if(filter_input(INPUT_POST, "akcja")=="zaloguj"){
    $userId = $um->login($db);
    if($userId > 0){
        header("location:zamowienie.php");
    } else {
        header("location:niepopdane.php");
    }
}

if(filter_input(INPUT_POST, "akcja")=="rejestracja"){
    $um->rejestracja($db);
    header("location:logowanie.php");
}

if(filter_input(INPUT_POST, "akcja")=="dodaj"){
    $zm->dodajZam($db);
    header("location:zamowienie.php");
}

if(filter_input(INPUT_POST, "akcja")=="usun"){
    $userId = $zm->userId($db);
    $sql = "DELETE FROM orders WHERE userId=$userId";
    $db->delete($sql);
    header("location:zamowienie.php");
}

if(filter_input(INPUT_POST, "akcja")=="zamowienie"){
    $sql = "SELECT * FROM logged_in_users";
    $pola = ["sessionId","userId"];
    $result = strip_tags($db->select($sql,$pola));
    if($result != ""){
        header("location:zamowienie.php");
    }
    else{
        header("location:logrej.php");
    }
}

function endsWith($string, $endString)
{
    $len = strlen($endString);
    if ($len == 0) {
        return true;
    }
    return (substr($string, -$len) === $endString);
}
