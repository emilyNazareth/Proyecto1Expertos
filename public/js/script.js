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
                            +  restaurants[i] + "'" + "class='btn btn-primary'>" 
                            + "Ir</a></div></div>"
                    }
                    $("#sites").html($createHTML);
                }, 3000);


            }
        }
    });
}




