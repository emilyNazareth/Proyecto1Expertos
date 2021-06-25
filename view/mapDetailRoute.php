<?php

include_once 'public/headerSections.php';
?>

<style>
 footer{
    position: fixed;
    bottom: 0;
    width: 100%;
    background-color: #FFF;
 }
 p{
   margin: .4rem;
 }



</style>

<h2 id="titlesMap">
  Seguí la ruta a tu destino</h2>

<div id="map"></div>
<div class="right__panel" id="right-panel">
  <p>Total Distance: <span id="total"></span></p>
</div>


<!-- Async script executes immediately and must be after any DOM elements used in callback. -->

<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_ql49R0d20IhxQAb5FqDeEdVbK4R2tiA&callback=initMap&libraries=&v=weekly"
    await
  >  
  </script>


