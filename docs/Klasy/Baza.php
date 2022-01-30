<?php

class Baza
{
    private $mysqli;

    public function __construct($serwer, $user, $pass, $baza)
    {
        $this->mysqli = new mysqli($serwer, $user, $pass, $baza);
        if ($this->mysqli->connect_error) {
            printf("Nie udało sie połączenie z serwerem: %s\n",
                $this->mysqli->connect_error);
            exit();
        }
        if ($this->mysqli->set_charset("utf8")) {
        }
    }

    function __destruct()
    {
        $this->mysqli->close();
    }

    public function select($sql, $pola)
    {
        $tresc = "";
        if ($result = $this->mysqli->query($sql)) {
            $ilepol = count($pola);
            $ile = $result->num_rows;
            $tresc .= "<table><tbody>";
            while ($row = $result->fetch_object()) {
                $tresc .= "<tr>";
                for ($i = 0; $i < $ilepol; $i++) {
                    $p = $pola[$i];
                    $tresc .= "<td>" . $row->$p . "</td>";
                }
                $tresc .= "</tr>";
            }
            $tresc .= "</table></tbody>";
            $result->close();
        }
        return $tresc;
    }

    public function delete($sql)
    {
        if ($this->mysqli->query($sql)) return true; else return false;
    }

    public function insert($sql)
    {
        if ($this->mysqli->query($sql)) return true; else return false;
    }

    public function selectUser($login, $passwd, $tabela)
    {
        $id = -1;
        $sql = "SELECT * FROM $tabela WHERE userName='$login'";
        if ($result = $this->mysqli->query($sql)) {
            $ile = $result->num_rows;
            if ($ile == 1) {
                $row = $result->fetch_object();
                $hash = $row->passwd;
                if (password_verify($passwd, $hash)) {
                    $id = intval($row->userId);
                }
            }
        }
        return $id;
    }

    public function selectOrders($sql){
        return $this->mysqli->query($sql);
    }

    public function getUserId($sql)
    {
        $result = $this->mysqli->query($sql);
        $row = $result->fetch_object();
        return intval($row->userId);
    }
}