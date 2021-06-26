<?php
include_once 'public/headerSections.php';
?>
<div class="container text-center" style='margin-top:0px;'>
    <h2 id="titles">
        Mapa del sitio

    </h2>
    <button onclick="goBack()">Go Back</button>
    <div class="" style="margin-top: 0px">
        <br>
        Inicio
        <br>
        |
        <br>
        <button onclick="window.location.href = '?controlador=Restaurant&accion=showRestaurantView'" type="button" class="btn btn-outline-primary">Restaurante</button>       

        <button onclick="window.location.href = '?controlador=Hotel&accion=showHotelView'" type="button" class="btn btn-outline-primary">Hotel</button>

        <button onclick="window.location.href = '?controlador=Activity&accion=showActivityView'" type="button" class="btn btn-outline-primary">Tipo Actividad</button>

        <button onclick="window.location.href = '?controlador=RecommendedSite&accion=showRecommendedSiteView'" type="button" class="btn btn-outline-primary">Sitios Recomendados</button>

        <button onclick="window.location.href = '?controlador=Tourist&accion=showTouristView'" type="button" class="btn btn-outline-primary">Tipo de turista</button>

        <button onclick="window.location.href = '?controlador=serviceEstablishments&accion=showServiceEstablishments'" type="button" class="btn btn-outline-primary">Establecimientos de servicio</button>

        <button onclick="window.location.href = '?controlador=TypeOfRoad&accion=showTypeOfRoadView'" type="button" class="btn btn-outline-primary">Tipo de camino</button>

        <button onclick="window.location.href = '?controlador=About&accion=aboutView'" type="button" class="btn btn-outline-primary">Créditos</button>



    </div>

    <br>
    <img style="margin-top: 5%" class="img-fluid" alt="Gif travel" src="public/img/travel.gif" width="200"
         height="250"/>

</div>
<script>
function goBack() {
  window.history.back();
}
</script>


<?php
include_once 'public/footerSections.php';
?>