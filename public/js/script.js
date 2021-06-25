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
            console.log(response);
            
            if (response === 0) {
                $("#result").html("<div class='alert alert-danger'>*No \n\
                    se encontraron registros</div>");
            } else {
                $("#sites").html("");
                timerId = setInterval(function () {
                    $("#spinner").html("");
                    $("#result").html("Rutas recomendadas que se cargaran dinamicamente");
                    $createHTML = "";
                    var restaurants = ["Ruta 1", "RUTA 2", "RUTA 3"];
                    for (var i = 0; i < restaurants.length; i++) {
                        $createHTML += "<div class='card' style='width: 18rem;'"
                            + "><img class='card-img-top' src='public/img/"
                            + restaurants[i] + ".jpg' width='300' height='300'" +
                            "alt='Card image cap'><div class='card-body'>" +
                            "<h5 class='card-title'>" + restaurants[i] + "</h5>" +
                            "<p class='card-text'>Tu mejor destino, disfruta de una" +
                            "delicia gastronomica en compañia de los tuyos</p>" +
                            "<button type='button' onclick='createRoute(1)'" +
                            "class='btn btn-primary'>Ir</button>" + "</div></div>";
                        //    + "<button type='button' onclick='createRoute()' class=class='btn btn-primary'>Ir</button>

                        // <button type="button" onclick="cleanFormRegisterProfessional()" class="btn btn-success btn-sm" id="btn-cancel">Cancelar</button>
                    }
                    $("#sites").html($createHTML);
                }, 3000);
            }
        }
    });
}

function calculateRoutesHotel(startingPoint, finalDestination,
    hotelStars, hotelType, hotelPrice, hotelFacility) {

    var parameters = {
        "startingPoint": startingPoint,
        "finalDestination": finalDestination,
        "hotelStars": hotelStars,
        "hotelType": hotelType,
        "hotelPrice": hotelPrice,
        "hotelFacility": hotelFacility
    };

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
                timerId = setInterval(function () {
                    $("#spinner").html("");
                    $("#result").html("Rutas recomendadas que se cargaran dinamicamente");
                    $createHTML = "";
                    var hotels = ["Ruta 1", "RUTA 2", "RUTA 3"];
                    for (var i = 0; i < hotels.length; i++) {
                        $createHTML += "<div class='card' style='width: 18rem;'"
                            + "><img class='card-img-top' src='public/img/"
                            + hotels[i] + ".jpg' width='300' height='300'" +
                            "alt='Card image cap'><div class='card-body'>" +
                            "<h5 class='card-title'>" + hotels[i] + "</h5>" +
                            "<p class='card-text'>Tu mejor destino, disfruta de un" +
                            "delicia gastronomica en compañia de los tuyos</p>" +
                            "<a href='?controlador=Hotel&accion=getRoute"
                            + "'" + "class='btn btn-primary'>"
                            + "Ir</a></div></div>"
                    }
                    $("#sites").html($createHTML);
                }, 3000);

            }
        }
    });
}

function calculateRoutesActivity(startingPoint, finalDestination,
    activityRequirement, activityType, activityPrice, activityModality, activityDuration) {

    var parameters = {
        "startingPoint": startingPoint,
        "finalDestination": finalDestination,
        "hotelStars": activityRequirement,
        "hotelType": activityType,
        "hotelPrice": activityPrice,
        "hotelFacility": activityModality,
        "activityDuration": activityDuration
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
                    $("#spinner").html("");
                    $("#result").html("Rutas recomendadas que se cargaran dinamicamente");
                    $createHTML = "";
                    var hotels = ["Ruta 1", "RUTA 2", "RUTA 3"];
                    for (var i = 0; i < hotels.length; i++) {
                        $createHTML += "<div class='card' style='width: 18rem;'"
                            + "><img class='card-img-top' src='public/img/"
                            + hotels[i] + ".jpg' width='300' height='300'" +
                            "alt='Card image cap'><div class='card-body'>" +
                            "<h5 class='card-title'>" + hotels[i] + "</h5>" +
                            "<p class='card-text'>Tu mejor destino, disfruta de un" +
                            "delicia gastronomica en compañia de los tuyos</p>" +
                            "<a href='?controlador=Hotel&accion=getRoute"
                            + "'" + "class='btn btn-primary'>"
                            + "Ir</a></div></div>"
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


function calculateRoutesTourist(startingPoint, finalDestination, typeTourist, ageRange, budget) {

    var parameters = {
        "startingPoint": startingPoint,
        "finalDestination": finalDestination,
        "typeTourist": typeTourist,
        "ageRange": ageRange,
        "budget": budget
    };
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
                    var sites = ["Ruta 1", "RUTA 2", "RUTA 3"];
                    for (var i = 0; i < sites.length; i++) {
                        $createHTML += "<div class='card' style='width: 18rem;'"
                            + "><img class='card-img-top' src='public/img/"
                            + sites[i] + ".jpg' width='300' height='300'" +
                            "alt='Card image cap'><div class='card-body'>" +
                            "<h5 class='card-title'>" + sites[i] + "</h5>" +
                            "<p class='card-text'>Tu mejor destino, disfruta del " +
                            "viaje en compañia de los tuyos</p>" +
                            "<a href='?controlador=Tourist&accion=getRoute"
                            + "'" + "class='btn btn-primary'>"
                            + "Ir</a></div></div>"
                    }
                    $("#sites").html($createHTML);
                }, 3000);
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
function calculateTypeOfRoad(startingPoint, finalDestination, typeOfRoad) {

    var parameters = {
        "startingPoint": startingPoint,
        "finalDestination": finalDestination,
        "typeOfRoad": typeOfRoad
    };
    $.ajax({
        data: parameters,
        url: '?controlador=TypeOfRoad&accion=getByTypeOfRoad',
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
                            "<p class='card-text'>Una de las mejores opciones  " +
                            "para disfrutar en este día</p>" +
                            "<a href='?controlador=TypeOfRoad&accion=getRoute"
                            + "'" + "class='btn btn-primary'>"
                            + "Ir</a></div></div>"
                    }
                    $("#sites").html($createHTML);
                }, 3000);

            }
        }
    });
}

function createRoute(id) {

    var parametros = { "id": id };

    $.ajax({
        data: parametros,
        url: '?controlador=Restaurant&accion=getRoute',
        type: 'post',
        dataType: 'json',
        success: function (response) {
            console.log(response.restaurantName);
            console.log(response.lat);
            console.log(response.lng);
            window.location.replace("?controlador=Restaurant&accion=showRestaurantRouteView");

            window.localStorage.setItem("latTest", response.lat);
            window.localStorage.setItem("lngTest", response.lng);
        }
    });




}


