
<?php
include 'header.php';
?> 

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles.css">
  <title>Accueil</title>
</head>

<body>
  <main>
    <h1>Bonjour, <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?>!</h1>
  </main>

  <body>
    <!-- Barre de recherche centrée -->
    <div id="search-container">
        <input id="search-input" type="text" placeholder="Rechercher un lieu">
        <button id="search-button">Rechercher</button>
    </div>

    <!-- Conteneur pour la carte -->
    <div id="map"!important>

        <script>

            // Fonction d'initialisation de la carte
            function initMap() {
                // Coordonnées initiales pour le centrage de la carte (ex. Paris)
                var initialCoords = { lat: 48.8566, lng: 2.3522 };

                // Création d'une instance de carte Google Maps
                var map = new google.maps.Map(document.getElementById('map'), {
                    center: initialCoords,
                    zoom: 12 // Niveau de zoom initial
                });

                // Création d'une instance de la barre de recherche
                var searchInput = document.getElementById('search-input');
                var searchButton = document.getElementById('search-button');
                var searchBox = new google.maps.places.SearchBox(searchInput);

                // Lorsque l'utilisateur effectue une recherche, centrez la carte sur le résultat
                searchBox.addListener('places_changed', function () {
                    var places = searchBox.getPlaces();

                    if (places.length === 0) {
                        return;
                    }

                    // Récupérez les coordonnées du résultat de recherche
                    var bounds = new google.maps.LatLngBounds();
                    places.forEach(function (place) {
                        if (!place.geometry) {
                            return;
                        }
                        bounds.extend(place.geometry.location);
                    });

                    // Centrez et zoomez la carte sur les résultats de recherche
                    map.fitBounds(bounds);
                });
            }
        </script>


        <!-- Inclure l'API Google Maps avec votre clé API -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhPIwFDjNs-PASkGJVsUyVAty_80OA-9Y&libraries=places&callback=initMap" async defer></script>

        <script src="reqettes.js"></script>

    </div>
</body>
</body>
<?php include 'footer.php'; ?>
