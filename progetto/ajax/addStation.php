<?php
    require_once("../classi/gestioneDB.php");
    $response = ["status" => false, "message" => "Errore durante l'aggiunta della stazione."];

    if (isset($_POST['codice'], $_POST['numero_slot'], $_POST['via'], $_POST['città'], $_POST['provincia'], $_POST['regione'], $_POST['CAP'])) {
        $gest = new gestioneDB();
        $gest->conn();

        $codice = $_POST['codice'];
        $numero_slot = $_POST['numero_slot'];
        $via = $_POST['via'];
        $città = $_POST['città'];
        $provincia = $_POST['provincia'];
        $regione = $_POST['regione'];
        $CAP = $_POST['CAP'];

        if ($gest->addStation($codice, $numero_slot, $via, $città, $provincia, $regione, $CAP)) {
            $response["status"] = true;
            $response["message"] = "Stazione aggiunta con successo.";
        }

        $gest->connection->close();
    }

    echo json_encode($response);
?>
