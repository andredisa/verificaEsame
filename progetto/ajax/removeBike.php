<?php
    require_once("../classi/gestioneDB.php");
    $response = ["status" => false, "message" => "Errore durante la rimozione della bicicletta."];

    if (isset($_POST['bike_id'])) {
        $gest = new gestioneDB();
        $gest->conn();

        $id = $_POST['bike_id'];

        if ($gest->removeBike($id)) {
            $response["status"] = true;
            $response["message"] = "Bicicletta rimossa con successo.";
        }

        $gest->connection->close();
    }

    echo json_encode($response);
?>
