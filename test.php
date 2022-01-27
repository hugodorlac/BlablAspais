<!-- Trajet avec map -->

  <div class="col-10">
    <div class='cardInfoTrajet col-7'>
        <div align='center'>
            <h3 class='mb-4'>Destination : <h3>
                    <div id='map'></div>
                    <a href='./index.php?statut=4' class='btn btn-danger'>Ajouter</a>

        </div>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCy50HWLvCjQGRnwtAkaDqThILv6tT7y3o&callback=initMap&v=weekly" async></script>
    <script>
        let map;

        function initMap() {
        var latLong = { lat: -25.363, lng: 131.044 };
        map = new google.maps.Map(document.getElementById("map"), {
            center: latLong,
            zoom: 8,
        });
        convertAdress("53 rue jean jaures, Yerres");
        }
        
        
        
    </script>

