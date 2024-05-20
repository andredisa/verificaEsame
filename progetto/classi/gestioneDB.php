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

    // Metodo per aggiungere un nuovo utente
    public function aggiungiUtente($email, $password, $nome, $cognome, $numero_tessera, $numero_carta_credito, $via, $città, $provincia, $regione, $CAP) {
        $password = md5($password);

        // Verifica se l'email è già registrata
        $query = $this->connection->prepare("SELECT * FROM cliente WHERE email=?");
        $query->bind_param("s", $email);
        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows > 0) {
            $query->close();
            return ["status" => false, "message" => "Email già registrata."];
        }

        $query->close();

        // Inserisci il nuovo cliente
        $query = $this->connection->prepare("INSERT INTO cliente (email, password, nome, cognome, numero_tessera, numero_carta_credito, via, città, provincia, regione, CAP) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $query->bind_param("ssssisssssi", $email, $password, $nome, $cognome, $numero_tessera, $numero_carta_credito, $via, $città, $provincia, $regione, $CAP);

        if ($query->execute()) {
            $query->close();
            return ["status" => true, "message" => "Registrazione avvenuta con successo."];
        } else {
            $query->close();
            return ["status" => false, "message" => "Errore durante l'inserimento nel database."];
        }
    }
}
?>
