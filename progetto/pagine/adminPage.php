<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Admin</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Gestione Amministrativa</h1>

        <!-- Sezione Stazioni -->
        <h2>Gestione Stazioni</h2>
        <button class="btn btn-primary" id="addStation">Aggiungi Stazione</button>
        <div id="stationForm" class="mt-3" style="display: none;">
            <form id="newStationForm">
                <div class="form-group">
                    <label for="codice">Codice</label>
                    <input type="text" id="codice" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="numero_slot">Numero Slot</label>
                    <input type="number" id="numero_slot" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="via">Via</label>
                    <input type="text" id="via" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="città">Città</label>
                    <input type="text" id="città" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="provincia">Provincia</label>
                    <input type="text" id="provincia" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="regione">Regione</label>
                    <input type="text" id="regione" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="CAP">CAP</label>
                    <input type="number" id="CAP" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Aggiungi</button>
            </form>
        </div>

        <button class="btn btn-danger mt-3" id="removeStation">Rimuovi Stazione</button>
        <div id="removeStationForm" class="mt-3" style="display: none;">
            <form id="deleteStationForm">
                <div class="form-group">
                    <label for="station_id">ID Stazione</label>
                    <input type="number" id="station_id" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-danger">Rimuovi</button>
            </form>
        </div>

        <!-- Sezione Slot -->
        <h2>Gestione Slot</h2>
        <button class="btn btn-primary" id="updateSlot">Aggiorna Numero Slot</button>
        <div id="slotForm" class="mt-3" style="display: none;">
            <form id="updateSlotForm">
                <div class="form-group">
                    <label for="slot_id">ID Stazione</label>
                    <input type="number" id="slot_id" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="numero_slot_update">Nuovo Numero Slot</label>
                    <input type="number" id="numero_slot_update" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Aggiorna</button>
            </form>
        </div>

        <!-- Sezione Biciclette -->
        <h2>Gestione Biciclette</h2>
        <button class="btn btn-primary" id="addBike">Aggiungi Bicicletta</button>
        <div id="bikeForm" class="mt-3" style="display: none;">
            <form id="newBikeForm">
                <div class="form-group">
                    <label for="codice_bike">Codice</label>
                    <input type="text" id="codice_bike" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="GPS">GPS</label>
                    <input type="text" id="GPS" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="RFID">RFID</label>
                    <input type="text" id="RFID" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="posizione_attuale">Posizione Attuale</label>
                    <input type="text" id="posizione_attuale" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Aggiungi</button>
            </form>
        </div>

        <button class="btn btn-danger mt-3" id="removeBike">Rimuovi Bicicletta</button>
        <div id="removeBikeForm" class="mt-3" style="display: none;">
            <form id="deleteBikeForm">
                <div class="form-group">
                    <label for="bike_id">ID Bicicletta</label>
                    <input type="number" id="bike_id" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-danger">Rimuovi</button>
            </form>
        </div>

        <!-- Sezione Clienti -->
        <h2>Gestione Clienti</h2>
        <button class="btn btn-primary" id="updateUser">Modifica Informazioni Cliente</button>
        <div id="userForm" class="mt-3" style="display: none;">
            <form id="updateUserForm">
                <div class="form-group">
                    <label for="user_id">ID Cliente</label>
                    <input type="number" id="user_id" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="cognome">Cognome</label>
                    <input type="text" id="cognome" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="numero_tessera">Numero Tessera</label>
                    <input type="text" id="numero_tessera" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="numero_carta_credito">Numero Carta di Credito</label>
                    <input type="text" id="numero_carta_credito" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="via">Via</label>
                    <input type="text" id="via" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="città">Città</label>
                    <input type="text" id="città" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="provincia">Provincia</label>
                    <input type="text" id="provincia" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="regione">Regione</label>
                    <input type="text" id="regione" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="CAP">CAP</label>
                    <input type="number" id="CAP" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Modifica</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#addStation").click(function(){
                $("#stationForm").toggle();
            });

            $("#removeStation").click(function(){
                $("#removeStationForm").toggle();
            });

            $("#updateSlot").click(function(){
                $("#slotForm").toggle();
            });

            $("#addBike").click(function(){
                $("#bikeForm").toggle();
            });

            $("#removeBike").click(function(){
                $("#removeBikeForm").toggle();
            });

            $("#updateUser").click(function(){
                $("#userForm").toggle();
            });

            $("#newStationForm").submit(function(e){
                e.preventDefault();
                $.ajax({
                    url: 'addStation.php',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(response){
                        alert(response.message);
                        location.reload();
                    }
                });
            });

            $("#deleteStationForm").submit(function(e){
                e.preventDefault();
                $.ajax({
                    url: '../ajax/removeStation.php',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(response){
                        alert(response.message);
                        location.reload();
                    }
                });
            });

            $("#updateSlotForm").submit(function(e){
                e.preventDefault();
                $.ajax({
                    url: '../ajax/updateSlot.php',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(response){
                        alert(response.message);
                        location.reload();
                    }
                });
            });

            $("#newBikeForm").submit(function(e){
                e.preventDefault();
                $.ajax({
                    url: '../ajax/addBike.php',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(response){
                        alert(response.message);
                        location.reload();
                    }
                });
            });

            $("#deleteBikeForm").submit(function(e){
                e.preventDefault();
                $.ajax({
                    url: '../ajax/removeBike.php',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(response){
                        alert(response.message);
                        location.reload();
                    }
                });
            });

            $("#updateUserForm").submit(function(e){
                e.preventDefault();
                $.ajax({
                    url: '../ajax/updateUser.php',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(response){
                        alert(response.message);
                        location.reload();
                    }
                });
            });
        });
    </script>
</body>
</html>
