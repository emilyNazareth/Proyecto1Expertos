<!DOCTYPE html>
<html lang="es">

<head>
    <title>Tarea 2</title>
    <meta charset="utf-8" />
    <meta name="description" content="Tarea 2 Algoritmo de Bayes" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="public/css/style.css" />
    <link rel="stylesheet" type="text/css" href="public/css/maps.css" />
    <link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css" />
    <link rel="shortcut icon" type="image/x-icon" href="public/img/logo.png" />

    <!--Access methods in javascript-->
    <script type="text/javascript" src="public/js/jquery-3.2.1.js"></script>
    <script src="public/js/script.js" type="text/javascript"></script>
    <script src="public/js/maps.js" type="text/javascript"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
      <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_ql49R0d20IhxQAb5FqDeEdVbK4R2tiA&callback=initMap&libraries=&v=weekly"
      async
    ></script>

    <!--Galery-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



</head>

<body id="sections">
    <div id="mainHeaderSections">
        <header>
            <div class="bs-example" style="margin-top: 50px">
                <nav class="navbar navbar-expand-md navbar-light bg-white">
                    <a href="?controlador=Index&accion=mostrar" class="navbar-brand">
                        <img class="img-fluid" alt="Tarea 2" src="public/img/logo.png" width="300" height="150" />
                    </a>
                    <button type="button" class="navbar-toggler  bg-danger" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarCollapse" style="background-color: #306583">
                        <div class="navbar-nav" style="background-color: #306583">
                            <a href="?controlador=Index&accion=mostrar" class="nav-item nav-link active change" style="color: white">Inicio</a>
                            <a href="?controlador=Index&accion=showSiteMap" class="nav-item nav-link active change" style="color: white">Mapa del Sitio</a>
                            <a href="?controlador=Restaurant&accion=showRestaurantView" class="nav-item nav-link change" style="color: white">Restaurante</a>
                            <a href="?controlador=Hotel&accion=showHotelView" class="nav-item nav-link change" style="color: white">Hotel</a>
                            <a href="?controlador=Activity&accion=showActivityView" class="nav-item nav-link change" style="color: white">Tipo de actividad</a>
                            <a href="?controlador=RecommendedSite&accion=showRecommendedSiteView" class="nav-item nav-link change" style="color: white">Sitios recomendados</a>
                            <a href="?controlador=Tourist&accion=showTouristView" class="nav-item nav-link change" style="color: white">Tipo de turista</a>
                            <a href="?controlador=serviceEstablishments&accion=showServiceEstablishments" class="nav-item nav-link change" style="color: white">Establecimientos de servicio</a>
                            <a href="?controlador=TypeOfRoad&accion=showTypeOfRoadView" class="nav-item nav-link change" style="color: white">Tipo de camino</a>
                            <a href="?controlador=About&accion=aboutView" class="nav-item nav-link change" style="color: white">Créditos</a>
                        </div>
                    </div>
                </nav>
            </div>
        </header>