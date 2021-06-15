

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
    { lat: 9.902628279822025, lng: -83.67073936030803 },
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
        { location: { lat: 9.819314765076408, lng: -83.85754995712739 } },   //9.819314765076408, -83.85754995712739     
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
}