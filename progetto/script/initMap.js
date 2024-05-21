function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: 45.4642, lng: 9.1900 },
        zoom: 13
    });

    // Ottieni le stazioni dal database
    $.ajax({
        url: '../ajax/getStations.php',
        method: 'GET',
        success: function(response) {
            var stazioni = JSON.parse(response);
            stazioni.forEach(function(stazione) {
                new google.maps.Marker({
                    position: { lat: parseFloat(stazione.lat), lng: parseFloat(stazione.lng) },
                    map: map,
                    title: stazione.nome
                });
            });
        },
        error: function(xhr, status, error) {
            console.error('Errore nel recupero delle stazioni:', error);
        }
    });
}
