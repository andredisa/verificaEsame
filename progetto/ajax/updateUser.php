<?php
    require_once("../classi/gestioneDB.php");
    $response = ["status" => false, "message" => "Errore durante l'aggiornamento delle informazioni del cliente."];

    if (isset($_POST['user_id'], $_POST['email'], $_POST['nome'], $_POST['cognome'], $_POST['numero_tessera'], $_POST['numero_carta_credito'], $_POST['via'], $_POST['città'], $_POST['provincia'], $_POST['regione'], $_POST['CAP'])) {
        $gest = new gestioneDB();
        $gest->conn();

        $id = $_POST['user_id'];
        $email = $_POST['email'];
        $nome = $_POST['nome'];
        $cognome = $_POST['cognome'];
        $numero_tessera = $_POST['numero_tessera'];
        $numero_carta_credito = $_POST['numero_carta_credito'];
        $via = $_POST['via'];
        $città = $_POST['città'];
        $provincia = $_POST['provincia'];
        $regione = $_POST['regione'];
        $CAP = $_POST['CAP'];

        if ($gest->updateUser($id, $email, $nome, $cognome, $numero_tessera, $numero_carta_credito, $via, $città, $provincia, $regione, $CAP)) {
            $response["status"] = true;
            $response["message"] = "Informazioni del cliente aggiornate con successo.";
        }

        $gest->connection->close();
    }

    echo json_encode($response);
?>
