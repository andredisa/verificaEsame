<?php
    require_once("../classi/gestioneDB.php");
    $response = ["status" => false, "message" => "Errore durante la rimozione della stazione."];

    if (isset($_POST['station_id'])) {
        $gest = new gestioneDB();
        $gest->conn();

        $id = $_POST['station_id'];

        if ($gest->removeStation($id)) {
            $response["status"] = true;
            $response["message"] = "Stazione rimossa con successo.";
        }

        $gest->connection->close();
    }

    echo json_encode($response);
?>
