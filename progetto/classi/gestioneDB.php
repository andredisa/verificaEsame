<?php

class gestioneDB
{
    public $connection;
    public $servername;
    public $username;
    public $password;
    public $dbname;

    public function __construct()
    {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "db_esame";
    }

    public function conn()
    {
        $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    }
    public function authenticateAdmin($email, $password)
    {
        $hashedPassword = md5($password);
        $query = $this->connection->prepare("SELECT * FROM admin WHERE email=? AND password=?");
        $query->bind_param("ss", $email, $hashedPassword);
        $query->execute();
        $result = $query->get_result();
        $query->close();

        return $result->num_rows > 0;
    }

    public function authenticateUser($email, $password)
    {
        $hashedPassword = md5($password);
        $query = $this->connection->prepare("SELECT * FROM cliente WHERE email=? AND password=?");
        $query->bind_param("ss", $email, $hashedPassword);
        $query->execute();
        $result = $query->get_result();
        $query->close();

        return $result->num_rows > 0;
    }

    public function getAdminIDByEmail($email)
    {
        $userID = -1;
        $query = $this->connection->prepare("SELECT ID FROM admin WHERE email=?");
        $query->bind_param("s", $email);
        $query->execute();
        $query->bind_result($userID);
        $query->fetch();
        $query->close();

        return $userID;
    }

    public function getUserIDByEmail($email)
    {
        $userID = -1;
        $query = $this->connection->prepare("SELECT ID FROM cliente WHERE email=?");
        $query->bind_param("s", $email);
        $query->execute();
        $query->bind_result($userID);
        $query->fetch();
        $query->close();

        return $userID;
    }
}
