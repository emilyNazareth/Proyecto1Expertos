/**
 * Verify if the field is empty
 * @param string $fieldValue value of field 
 * @return Boolean  return true or false  
 */
function isFieldEmpty(fieldValue) {
    if (fieldValue.trim() === "") {
        return true;
    } else {
        return false;
    }

}


function calculateRoutesRestaurant($initialDestination, $finalDestination,
        $duration, $distance, $price, $closingTime) {

    var parameters = {
        "initialDestination": $initialDestination,
        "finalDestination": $finalDestination,
        "duration": $duration,
        "distance": $distance,
        "price": $price,
        "closingTime": $closingTime
    };

    localStorage.setItem('initialDestination', $initialDestination);
    localStorage.setItem('finalDestination', $finalDestination);
    $.ajax({
        data: parameters,
        url: '?controlador=Restaurant&accion=getRoutesByRestaurant',
        type: 'post',
        beforeSend: function () {
            $("#result").html("");
            $("#spinner").html(" <div class='spinner-border text-primary' style='margin-top: 5%' id='spinner' role='status'></div>");
        },
        success: function (response) {
            /*Set the span label result*/
            if (response === 0) {
                $("#result").html("<div class='alert alert-danger'>*No \n\
                    se encontraron registros</div>");
            } else {
                $("#sites").html("");
                timerId = setInterval(function () {
                    $("#spinner").html("");
                    $("#result").html("Rutas recomendadas que se cargaran dinamicamente");
                    $createHTML = "";

                    localStorage.setItem("routes", response);

                    /*routes['route1'].forEach(element => {
                     console.table(element);    
                     });*/
                    var restaurants = ["Ruta 1", "RUTA 2", "RUTA 3"];
                    for (var i = 0; i < restaurants.length; i++) {
                        $createHTML += "<div class='card' style='width: 18rem;'"
                                + "><img class='card-img-top' src='public/img/"
                                + restaurants[i] + ".jpg' width='300' height='300'" +
                                "alt='Card image cap'><div class='card-body'>" +
                                "<h5 class='card-title'>" + restaurants[i] + "</h5>" +
                                "<p class='card-text'>"+ getPlacesRoute('route' + i)  +"</p>" +
                                "<button type='button' onclick='createRoute(`route" + i + "`)'" +
                                "class='btn btn-primary'>Ir</button>" + "</div></div>";
                        //    + "<button type='button' onclick='createRoute()' class=class='btn btn-primary'>Ir</button>

                        // <button type="button" onclick="cleanFormRegisterProfessional()" class="btn btn-success btn-sm" id="btn-cancel">Cancelar</button>
                    }


                    $("#sites").html($createHTML);

                }, 1000);
            }
        }
    });
}


            

function calculateRoutesHotel($startingPoint, $finalDestination,
        $duration, $hotelType, $hotelPrice, $distance) {

    var parameters = {
        "startingPoint": $startingPoint,
        "finalDestination": $finalDestination,
        "duration": $duration,
        "hotelType": $hotelType,
        "hotelPrice": $hotelPrice,
        "distance": $distance
    };
    localStorage.setItem('initialDestination', $startingPoint);
    localStorage.setItem('finalDestination', $finalDestination);
    $.ajax({
        data: parameters,
        url: '?controlador=Hotel&accion=getRoutesByHotel',
        type: 'post',
        beforeSend: function () {
            $("#result").html("");
            $("#spinner").html(" <div class='spinner-border text-primary' style='margin-top: 5%' id='spinner' role='status'></div>");
        },
        success: function (response) {
            /*Set the span label result*/
            if (response === 0) {
                $("#result").html("<div class='alert alert-danger'>*No \n\
                    se encontraron registros</div>");
            } else {
                $("#sites").html("");
                timerId = setInterval(function () {
                    $("#spinner").html("");
                    $("#result").html("Rutas recomendadas que se cargaran dinamicamente");
                    $createHTML = "";


                    localStorage.setItem("routes", response);

                    console.log(response);
                    var hotels = ["Ruta 1", "Ruta 2", "Ruta 3"];
                    for (var i = 0; i < hotels.length; i++) {
                        $createHTML += "<div class='card' style='width: 18rem;'"
                                + "><img class='card-img-top' src='public/img/"
                                + hotels[i] + ".jpg' width='300' height='300'" +
                                "alt='Card image cap'><div class='card-body'>" +
                                "<h5 class='card-title'>" + hotels[i] + "</h5>" +
                                "<p class='card-text'>"+ getPlacesRoute('route' + i)  +"</p>" +
                                "<button type='button' onclick='createRouteHotel(`route" + i + "`)'" +
                                "class='btn btn-primary'>Ir</button>" + "</div></div>";
                    }
                    $("#sites").html($createHTML);
                }, 1000);

            }
        }
    });
}

function calculateRoutesActivity(startingPoint, finalDestination,
    activityType, activityPrice,  activityDuration, distance) {

   var parameters = {
       "startingPoint": startingPoint,
       "finalDestination": finalDestination,
       "activityType": activityType,
       "price": activityPrice,
       "duration": activityDuration,
       "distance": distance
   };


   $.ajax({
       data: parameters,
       url: '?controlador=Activity&accion=getRoutesByActivity',
       type: 'post',
       beforeSend: function () {
           $("#result").html("");
           $("#spinner").html(" <div class='spinner-border text-primary' style='margin-top: 5%' id='spinner' role='status'></div>");
       },
       success: function (response) {
           /*Set the span label result*/
           if (response === 0) {
               $("#result").html("<div class='alert alert-danger'>*No \n\
                   se encontraron registros</div>");
           } else {
               timerId = setInterval(function () {

                   localStorage.setItem("routes", response);


                   $("#spinner").html("");
                   
                   $createHTML = "";
                   var activities = ["Ruta 1", "RUTA 2", "RUTA 3"];
                   for (var i = 0; i < activities.length; i++) {
                       $createHTML += "<div class='card' style='width: 18rem;'"
                           + "><img class='card-img-top' src='public/img/"
                           + activities[i] + ".jpg' width='300' height='300'" +
                           "alt='Card image cap'><div class='card-body'>" +
                           "<h5 class='card-title'>" + activities[i] + "</h5>" +
                           "<p class='card-text'>Tu mejor destino, disfruta estas" +
                           "maravillosas actividades en estar rutas para ti</p>" +
                           "<button type='button' onclick='createRoute(`route" + i + "`)'" +
                           "class='btn btn-primary'>Ir</button>" + "</div></div>";
                   }
                   $("#sites").html($createHTML);
               }, 3000);

           }
       }
   });
}

function calculateRecommendedSite(startingPoint, finalDestination) {

    var parameters = {
        "startingPoint": startingPoint,
        "finalDestination": finalDestination
    };
    $.ajax({
        data: parameters,
        url: '?controlador=RecommendedSite&accion=getRecommendedSite',
        type: 'post',

        beforeSend: function () {
            $("#result").html("");
            $("#spinner").html(" <div class='spinner-border text-primary' style='margin-top: 5%' id='spinner' role='status'></div>");
        },
        success: function (response) {
            /*Set the span label result*/
            if (response === 0) {
                $("#result").html("<div class='alert alert-danger'>*No \n\
                    se encontraron registros</div>");
            } else {
                $("#sites").html("");
                timerId = setInterval(function () {
                    $("#spinner").html("");
                    $("#result").html("Rutas recomendadas que se cargaran dinamicamente");
                    $createHTML = "";
                    var sites = ["Ruta 1", "RUTA 2", "RUTA 3"];
                    for (var i = 0; i < sites.length; i++) {
                        $createHTML += "<div class='card' style='width: 18rem;'"
                                + "><img class='card-img-top' src='public/img/"
                                + sites[i] + ".jpg' width='300' height='300'" +
                                "alt='Card image cap'><div class='card-body'>" +
                                "<h5 class='card-title'>" + sites[i] + "</h5>" +
                                "<p class='card-text'>Tu mejor destino, disfruta del " +
                                "viaje en compañia de los tuyos</p>" +
                                "<a href='?controlador=RecommendedSite&accion=getRoute"
                                + "'" + "class='btn btn-primary'>"
                                + "Ir</a></div></div>"
                    }
                    $("#sites").html($createHTML);
                }, 3000);

            }
        }
    });
}


function calculateRoutesTourist(startingPoint, finalDestination, typeTourist, ageRange, duration, distance) {

    var parameters = {
        "startingPoint": startingPoint,
        "finalDestination": finalDestination,
        "typeTourist": typeTourist,
        "ageRange": ageRange,
        "duration": duration,
        "distance": distance
    };
    localStorage.setItem('initialDestination', startingPoint);
    localStorage.setItem('finalDestination', finalDestination);
    $.ajax({
        data: parameters,
        url: '?controlador=Tourist&accion=getRoutesByTourist',
        type: 'post',

        beforeSend: function () {
            $("#result").html("");
            $("#spinner").html(" <div class='spinner-border text-primary' style='margin-top: 5%' id='spinner' role='status'></div>");
        },
        success: function (response) {
            /*Set the span label result*/
            if (response === 0) {
                $("#result").html("<div class='alert alert-danger'>*No \n\
                    se encontraron registros</div>");
            } else {
                $("#sites").html("");
                timerId = setInterval(function () {
                    $("#spinner").html("");
                    $("#result").html("Rutas recomendadas que se cargaran dinamicamente");
                    $createHTML = "";


                    localStorage.setItem("routes", response);

                    console.log(response);
                    var tourist = ["Ruta 1", "Ruta 2", "Ruta 3"];
                    for (var i = 0; i < tourist.length; i++) {
                        $createHTML += "<div class='card' style='width: 18rem;'"
                                + "><img class='card-img-top' src='public/img/"
                                + tourist[i] + ".jpg' width='300' height='300'" +
                                "alt='Card image cap'><div class='card-body'>" +
                                "<h5 class='card-title'>" + tourist[i] + "</h5>" +
                                "<p class='card-text'>Las mejores actividades en tu ruta ideal</p>" +
                                "<button type='button' onclick='createRouteTourist(`route" + i + "`)'" +
                                "class='btn btn-primary'>Ir</button>" + "</div></div>";
                    }
                    $("#sites").html($createHTML);
                }, 1000);

            }
        }
    });
}
function calculateServiceEstablishments(startingPoint) {

    var parameters = {
        "startingPoint": startingPoint
    };
    $.ajax({
        data: parameters,
        url: '?controlador=ServiceEstablishments&accion=getServiceEstablishments',
        type: 'post',

        beforeSend: function () {
            $("#result").html("");
            $("#spinner").html(" <div class='spinner-border text-primary' style='margin-top: 5%' id='spinner' role='status'></div>");
        },
        success: function (response) {
            /*Set the span label result*/
            if (response === 0) {
                $("#result").html("<div class='alert alert-danger'>*No \n\
                    se encontraron registros</div>");
            } else {
                timerId = setInterval(function () {
                    $("#spinner").html("");
                    $("#result").html("Rutas recomendadas que se cargarán dinámicamente");
                    $createHTML = "";
                    var serviceEstablishments = ["Ruta 1", "RUTA 2", "RUTA 3"];
                    for (var i = 0; i < serviceEstablishments.length; i++) {
                        $createHTML += "<div class='card' style='width: 18rem;'"
                                + "><img class='card-img-top' src='public/img/"
                                + serviceEstablishments[i] + ".jpg' width='300' height='300'" +
                                "alt='Card image cap'><div class='card-body'>" +
                                "<h5 class='card-title'>" + serviceEstablishments[i] + "</h5>" +
                                "<p class='card-text'>Una de las opciones cercanas " +
                                "sobre establecimientos de servicios</p>" +
                                "<a href='?controlador=ServiceEstablishments&accion=getRoute" +
                                "'" + "class='btn btn-primary'>"
                                + "Ir</a></div></div>"
                    }
                    $("#sites").html($createHTML);
                }, 3000);

            }
        }
    });
}
function calculateTypeOfRoad(startingPoint, finalDestination, typeOfRoad, duration, distance) {

    var parameters = {
        "startingPoint": startingPoint,
        "finalDestination": finalDestination,
        "typeOfRoad": typeOfRoad,
        "duration" : duration,
        "distance" : distance,
    };
    localStorage.setItem('initialDestination', startingPoint);
    localStorage.setItem('finalDestination', finalDestination);
    $.ajax({
        data: parameters,
        url: '?controlador=TypeOfRoad&accion=getRoutesByTypeOfRoad',
        type: 'post',
        beforeSend: function () {
            $("#result").html("");
            $("#spinner").html(" <div class='spinner-border text-primary' style='margin-top: 5%' id='spinner' role='status'></div>");
        },
        success: function (response) {
            /*Set the span label result*/
            if (response === 0) {
                $("#result").html("<div class='alert alert-danger'>*No \n\
                    se encontraron registros</div>");
            } else {
                $("#sites").html("");
                timerId = setInterval(function () {
                    $("#spinner").html("");
                    $("#result").html("Rutas encontradas:");
                    $createHTML = "";  
                                    
                    console.log(response);
                    var hotels = ["Ruta 1", "Ruta 2", "Ruta 3"];
                    for (var i = 0; i < hotels.length; i++) {
                        $createHTML += "<div class='card' style='width: 18rem;'"
                            + "><img class='card-img-top' src='public/img/"
                            + hotels[i] + ".jpg' width='300' height='300'" +
                            "alt='Card image cap'><div class='card-body'>" +
                            "<h5 class='card-title'>" + hotels[i] + "</h5>" +
                            "<p class='card-text'>"+ getPlacesRoute('route' + i)  +"</p>" +
                            "<button type='button' onclick='createRouteHotel(`route" + i + "`)'" +
                            "class='btn btn-primary'>Ir</button>" + "</div></div>";

                    }//getPlacesRoute('route' + i) 
                    $("#sites").html($createHTML);
                }, 1000);

            }
        }
    });
}
function getPlacesRoute(id) {
    routes = JSON.parse(localStorage.getItem("routes"));    
    places = "";

    places += routes[id][0].name;
    places += ", "
    places += routes[id][1].name;
    places += ", \n"
    places += routes[id][2].name;
    places += "."

    return places;
}

function createRoute(id) {


    routes = JSON.parse(localStorage.getItem("routes"));
    console.table(routes[id]);

    if (localStorage.getItem("initialDestination") === "Heredia") {
        localStorage.setItem('intialPointLat', 9.9981466);
        localStorage.setItem('intialPointLong', -84.121953);
    } else if (localStorage.getItem("initialDestination") === "Cartago") {
        localStorage.setItem('intialPointLat', 9.864847975868312);
        localStorage.setItem('intialPointLong', -83.91976879226273);
    } else if (localStorage.getItem("initialDestination") === "San_Jose") {
        localStorage.setItem('intialPointLat', 9.933499874895771);
        localStorage.setItem('intialPointLong', -84.0795456753859);
    } else {
        localStorage.setItem('intialPointLat', 10.016918331611171);
        localStorage.setItem('intialPointLong', -84.21299048083986);
    }

    if (localStorage.getItem("finalDestination") === "Heredia") {
        localStorage.setItem('finalPointLat', 9.9981466);
        localStorage.setItem('finalPointLong', -84.121953);
    } else if (localStorage.getItem("finalDestination") === "Cartago") {
        localStorage.setItem('finalPointLat', 9.864847975868312);
        localStorage.setItem('finalPointLong', -83.91976879226273);
    } else if (localStorage.getItem("finalDestination") === "San_Jose") {
        localStorage.setItem('finalPointLat', 9.933499874895771);
        localStorage.setItem('finalPointLong', -84.0795456753859);
    } else {
        localStorage.setItem('finalPointLat', 10.016918331611171);
        localStorage.setItem('finalPointLong', -84.21299048083986);
    }


    // localStorage.setItem('finalPointLat', 9.864945048401639);
    // localStorage.setItem('finalPointLong', -83.9163496422722);

    localStorage.setItem('firstPlaceLat', routes[id][0].lat_site);
    localStorage.setItem('firstPlaceLong', routes[id][0].long_site);

    localStorage.setItem('secondPlaceLat', routes[id][1].lat_site);
    localStorage.setItem('secondPlaceLong', routes[id][1].long_site);

    localStorage.setItem('thirdPlaceLat', routes[id][2].lat_site);
    localStorage.setItem('thirdPlaceLong', routes[id][2].long_site);

    window.location.replace("?controlador=Restaurant&accion=showRestaurantRouteView");

}

function createRouteHotel(id) {
    routes = JSON.parse(localStorage.getItem("routes"));
    console.table(routes[id]);

    if (localStorage.getItem("initialDestination") === "Heredia") {
        localStorage.setItem('intialPointLat', 9.9981466);
        localStorage.setItem('intialPointLong', -84.121953);
    } else if (localStorage.getItem("initialDestination") === "Cartago") {
        localStorage.setItem('intialPointLat', 9.864847975868312);
        localStorage.setItem('intialPointLong', -83.91976879226273);
    } else if (localStorage.getItem("initialDestination") === "San_Jose") {
        localStorage.setItem('intialPointLat', 9.933499874895771);
        localStorage.setItem('intialPointLong', -84.0795456753859);
    } else {
        localStorage.setItem('intialPointLat', 10.016918331611171);
        localStorage.setItem('intialPointLong', -84.21299048083986);
    }

    if (localStorage.getItem("finalDestination") === "Heredia") {
        localStorage.setItem('finalPointLat', 9.9981466);
        localStorage.setItem('finalPointLong', -84.121953);
    } else if (localStorage.getItem("finalDestination") === "Cartago") {
        localStorage.setItem('finalPointLat', 9.864847975868312);
        localStorage.setItem('finalPointLong', -83.91976879226273);
    } else if (localStorage.getItem("finalDestination") === "San_Jose") {
        localStorage.setItem('finalPointLat', 9.933499874895771);
        localStorage.setItem('finalPointLong', -84.0795456753859);
    } else {
        localStorage.setItem('finalPointLat', 10.016918331611171);
        localStorage.setItem('finalPointLong', -84.21299048083986);
    }

    localStorage.setItem('firstPlaceLat', routes[id][0].lat_site);
    localStorage.setItem('firstPlaceLong', routes[id][0].long_site);

    localStorage.setItem('secondPlaceLat', routes[id][1].lat_site);
    localStorage.setItem('secondPlaceLong', routes[id][1].long_site);

    localStorage.setItem('thirdPlaceLat', routes[id][2].lat_site);
    localStorage.setItem('thirdPlaceLong', routes[id][2].long_site);

    window.location.replace("?controlador=Hotel&accion=showHotelRouteView");

}


function createRouteTourist(id) {
    routes = JSON.parse(localStorage.getItem("routes"));
    console.table(routes[id]);

    if (localStorage.getItem("initialDestination") === "Heredia") {
        localStorage.setItem('intialPointLat', 9.9981466);
        localStorage.setItem('intialPointLong', -84.121953);
    } else if (localStorage.getItem("initialDestination") === "Cartago") {
        localStorage.setItem('intialPointLat', 9.864847975868312);
        localStorage.setItem('intialPointLong', -83.91976879226273);
    } else if (localStorage.getItem("initialDestination") === "San_Jose") {
        localStorage.setItem('intialPointLat', 9.933499874895771);
        localStorage.setItem('intialPointLong', -84.0795456753859);
    } else {
        localStorage.setItem('intialPointLat', 10.016918331611171);
        localStorage.setItem('intialPointLong', -84.21299048083986);
    }

    if (localStorage.getItem("finalDestination") === "Heredia") {
        localStorage.setItem('finalPointLat', 9.9981466);
        localStorage.setItem('finalPointLong', -84.121953);
    } else if (localStorage.getItem("finalDestination") === "Cartago") {
        localStorage.setItem('finalPointLat', 9.864847975868312);
        localStorage.setItem('finalPointLong', -83.91976879226273);
    } else if (localStorage.getItem("finalDestination") === "San_Jose") {
        localStorage.setItem('finalPointLat', 9.933499874895771);
        localStorage.setItem('finalPointLong', -84.0795456753859);
    } else {
        localStorage.setItem('finalPointLat', 10.016918331611171);
        localStorage.setItem('finalPointLong', -84.21299048083986);
    }

    localStorage.setItem('firstPlaceLat', routes[id][0].lat_site);
    localStorage.setItem('firstPlaceLong', routes[id][0].long_site);

    localStorage.setItem('secondPlaceLat', routes[id][1].lat_site);
    localStorage.setItem('secondPlaceLong', routes[id][1].long_site);

    localStorage.setItem('thirdPlaceLat', routes[id][2].lat_site);
    localStorage.setItem('thirdPlaceLong', routes[id][2].long_site);

    window.location.replace("?controlador=Tourist&accion=showTouristRouteView");

}