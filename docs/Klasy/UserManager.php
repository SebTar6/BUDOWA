<?php
include_once "Baza.php";

class UserManager
{
    function rejestracja($db)
    {
        $args = [
            'login' => FILTER_SANITIZE_SPECIAL_CHARS,
            'passwd' => FILTER_SANITIZE_SPECIAL_CHARS
        ];
        $dane = filter_input_array(INPUT_POST, $args);
        $login = $dane["login"];
        $passwd = $dane["passwd"];
        $passwd = password_hash($passwd, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (userName, passwd) VALUES ('$login', '$passwd')";
        $db->insert($sql);
    }

    function login($db)
    {
        $args = [
            'login' => FILTER_SANITIZE_SPECIAL_CHARS,
            'passwd' => FILTER_SANITIZE_SPECIAL_CHARS
        ];
        $dane = filter_input_array(INPUT_POST, $args);
        $login = $dane["login"];
        $passwd = $dane["passwd"];
        $userId = $db->selectUser($login, $passwd, "users");
        if ($userId >= 0) {
            session_start();
            $db->delete("DELETE FROM logged_in_users WHERE userId=$userId");
            $sessionId = session_id();
            $sql = "INSERT INTO logged_in_users (sessionId, userId) VALUES ('$sessionId', $userId)";
            $db->insert($sql);
        }
        return $userId;
    }

    function logout($db)
    {
        session_start();
        $id = session_id();
        if (filter_input(INPUT_COOKIE, session_name())) {
            setcookie(session_name(), '', time() - 42000, '/');
        }
        session_destroy();
        $db->delete("DELETE FROM logged_in_users WHERE sessionId='$id'");
    }
}