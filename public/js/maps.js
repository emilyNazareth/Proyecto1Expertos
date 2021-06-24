function initMap() {

  var mapOptions = {
    zoom: 17,
    center: new google.maps.LatLng(51.506767, -0.1244953),
    mapTypeId: google.maps.MapTypeId.TERRAIN
  };

  const map = new google.maps.Map(document.getElementById("map"), mapOptions);
  const directionsService = new google.maps.DirectionsService();
  const directionsRenderer = new google.maps.DirectionsRenderer({
    draggable: true,
    map,
    panel: document.getElementById("right-panel"),
  });
  directionsRenderer.addListener("directions_changed", () => {
    computeTotalDistance(directionsRenderer.getDirections());
  });
  displayRoute(
    {
      lat: Number.parseFloat(window.localStorage.getItem("latTest")),
      lng: Number.parseFloat(window.localStorage.getItem("lngTest"))
    },
    { lat: 9.867059081908426, lng: -83.92810832094152 },
    directionsService,
    directionsRenderer
  );
  var marker = new google.maps.Marker({
    map: map,
    draggable: false,
    position: new google.maps.LatLng(51.506767, -0.1244953)
  });


  google.maps.event.addDomListener(window, 'resize', initialize);
  google.maps.event.addDomListener(window, 'load', initialize);
}

function displayRoute(origin, destination, service, display) {
  service.route(
    {
      origin: origin,
      destination: destination,
      waypoints: [
        { location: { lat: 9.896816730647581, lng: -83.78580388729162 } },
        { location: { lat: 9.819314765076408, lng: -83.85754995712739 } },
      ],
      travelMode: google.maps.TravelMode.DRIVING,
      avoidTolls: true,
    },
    (result, status) => {
      if (status === "OK" && result) {
        display.setDirections(result);

      } else {
        alert("Could not display directions due to: " + status);
      }
    }
  );
}

function computeTotalDistance(result) {
  let total = 0;
  const myroute = result.routes[0];

  if (!myroute) {
    return;
  }

  for (let i = 0; i < myroute.legs.length; i++) {
    total += myroute.legs[i].distance.value;
  }
  total = total / 1000;
  document.getElementById("total").innerHTML = total + " km";
  document.querySelector('body').append(document.createElement('footer'));
  const f = document.querySelector('footer');
  f.classList.add('text-muted');
  f.innerHTML = '<center>' +
    ' <div id="nameEmail" class="container">' +
    '<p style="font-family: \'Lobster Two\'; font-size: 20px;">Desarrollado por: Info Team</p>' +
    '<p>Sitio web con fines académicos</p> ' +
    '<p> 2021</p' +
    '</div>' +
    '</center>';
  /*$('right-panel').append(' <footer  class="text-muted" style="margin-top: 15%;">'+
  '<center>'+
     ' <div id="nameEmail" class="container">'+
          '<p style="font-family: \'Lobster Two\'; font-size: 20px;">Desarrollado por: Info Team</p>'+                                                   
          '<p>Sitio web con fines académicos</p> '+
          '<p> 2021</p'+
          '<a id="logoa" href="index.html">'+
              '<img id="imgLogoFooter" src="public/img/logo.png" alt="Tarea 1" width="300"'+
                  ' height="100">'+
          '</a>'+
      '</div>'+
  '</center>'+
'</footer>');*/
}