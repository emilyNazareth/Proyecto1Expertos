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
                timerId = setInterval(function () {
                    $("#spinner").html("");
                    $("#result").html("Aqui van rutas recomendadas");
                }, 3000);

            }
        }
    });
}



