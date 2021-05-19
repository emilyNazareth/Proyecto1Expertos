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
        $restaurantStars, $foodType, $price, $restauranteType, $closingTime) {

    var parameters = {
        "initialDestination": $initialDestination,
        "finalDestination": $finalDestination,
        "restaurantStars": $restaurantStars,
        "foodType": $foodType,
        "price": $price,
        "restauranteType": $restauranteType,
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
            if (response === 0) {
                $("#result").html("<div class='alert alert-danger'>*No \n\
                    se encontraron registros</div>");
            } else {
                $("#sites").html("");
                timerId = setInterval(function () {
                    $("#spinner").html("");
                    $("#result").html("Rutas recomendadas que se cargaran dinamicamente");
                    $createHTML = "";
                    var restaurants = ["Tukasa", "Silvestre", "Rio"];
                    for (var i = 0; i < restaurants.length; i++) {
                        $createHTML += "<div class='card' style='width: 18rem;'"
                                + "><img class='card-img-top' src='public/img/"
                                + restaurants[i] + ".jpg' width='300' height='300'" +
                                "alt='Card image cap'><div class='card-body'>" +
                                "<h5 class='card-title'>" + restaurants[i] + "</h5>" +
                                "<p class='card-text'>Tu mejor destino, disfruta de un" +
                                "delicia gastronomica en compañia de los tuyos</p>" +
                                "<a href='?controlador=Restaurant&accion=showSiteAddress&id="
                                + restaurants[i] + "'" + "class='btn btn-primary'>"
                                + "Ir</a></div></div>"
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
                    $("#result").html("Aqui van rutas recomendadas");
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
                    $("#result").html("Aqui van rutas recomendadas");
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
                    var sites = ["Tukasa", "Silvestre", "Rio"];
                    for (var i = 0; i < sites.length; i++) {
                        $createHTML += "<div class='card' style='width: 18rem;'"
                                + "><img class='card-img-top' src='public/img/"
                                + sites[i] + ".jpg' width='300' height='300'" +
                                "alt='Card image cap'><div class='card-body'>" +
                                "<h5 class='card-title'>" + sites[i] + "</h5>" +
                                "<p class='card-text'>Tu mejor destino, disfruta del" +
                                "viaje en compañia de los tuyos</p>" +
                                "<a href='?controlador=RecommendedSite&accion=showSiteAddress&id="
                                + sites[i] + "'" + "class='btn btn-primary'>"
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
                    var sites = ["Tukasa", "Silvestre", "Rio"];
                    for (var i = 0; i < sites.length; i++) {
                        $createHTML += "<div class='card' style='width: 18rem;'"
                                + "><img class='card-img-top' src='public/img/"
                                + sites[i] + ".jpg' width='300' height='300'" +
                                "alt='Card image cap'><div class='card-body'>" +
                                "<h5 class='card-title'>" + sites[i] + "</h5>" +
                                "<p class='card-text'>Tu mejor destino, disfruta del" +
                                "viaje en compañia de los tuyos</p>" +
                                "<a href='?controlador=Tourist&accion=showSiteAddress&id="
                                + sites[i] + "'" + "class='btn btn-primary'>"
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
                    var serviceEstablishments = ["JSMTurrialba", "Delta", "UNO"];
                    for (var i = 0; i < serviceEstablishments.length; i++) {
                        $createHTML += "<div class='card' style='width: 18rem;'"
                            + "><img class='card-img-top' src='public/img/"
                            + serviceEstablishments[i] + ".jpg' width='300' height='300'" +
                            "alt='Card image cap'><div class='card-body'>" +
                            "<h5 class='card-title'>" + serviceEstablishments[i] + "</h5>" +
                            "<p class='card-text'>Una de las opciones cercanas " +
                            "sobre establecimientos de servicios</p>" +
                            "<a href='?controlador=ServiceEstablishments&accion=getServiceEstablishments&id=" 
                            +  serviceEstablishments[i] + "'" + "class='btn btn-primary'>" 
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
                    var serviceEstablishments = ["Ujarrás", "Sanatorio-Durán", "Prusia"];
                    for (var i = 0; i < serviceEstablishments.length; i++) {
                        $createHTML += "<div class='card' style='width: 18rem;'"
                            + "><img class='card-img-top' src='public/img/"
                            + serviceEstablishments[i] + ".jpg' width='300' height='300'" +
                            "alt='Card image cap'><div class='card-body'>" +
                            "<h5 class='card-title'>" + serviceEstablishments[i] + "</h5>" +
                            "<p class='card-text'>Una de las mejores opciones  " +
                            "para disfrutar en este día</p>" +
                            "<a href='?controlador=TypeOfRoad&accion=getByTypeOfRoad&id=" 
                            +  serviceEstablishments[i] + "'" + "class='btn btn-primary'>" 
                            + "Ir</a></div></div>"
                    }
                    $("#sites").html($createHTML);
                }, 3000);

            }
        }
    });
}
