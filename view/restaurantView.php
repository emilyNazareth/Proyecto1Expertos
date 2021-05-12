<?php
include_once 'public/headerSections.php';
?>
<div class="container text-center">

    <h2 id="titles">
        Busqueda por restaurante</h2>

    <div class="container">

        <div class="row">
            <div class="col-sm">
                <label class="restaurant" for="initialDestination">
                    Punto de partida</label>
                <br>
                <select class="form-select" id="initialDestination">
                    <option value="1">Divergente</option>
                    <option value="2">Convergente</option>
                    <option value="3">Asimilador</option>
                    <option value="4">Acomodador</option>
                </select>
            </div>
            <div class="col-sm">
                <label class="restaurant" for="finalDestination">
                    Punto de llegada</label>
                <br>
                <select class="form-select" id="finalDestination">
                    <option value="1">Divergente</option>
                    <option value="2">Convergente</option>
                    <option value="3">Asimilador</option>
                    <option value="4">Acomodador</option>
                </select>
            </div>
            <div class="col-sm">
                <label class="restaurant" for="restaurantStars">
                    Estrellas</label>
                <br>
                <select class="form-select" id="restaurantStars">
                    <option value="1">Divergente</option>
                    <option value="2">Convergente</option>
                    <option value="3">Asimilador</option>
                    <option value="4">Acomodador</option>
                </select>
            </div>
        </div>
    </div>
    <div class="container">
        <div style="margin-top: 5%" class="row">
            <div class="col-sm">
                <label class="restaurant" for="foodType">
                    Tipo de comida</label>
                <br>
                <select class="form-select" id="foodType">
                    <option value="1">Divergente</option>
                    <option value="2">Convergente</option>
                    <option value="3">Asimilador</option>
                    <option value="4">Acomodador</option>
                </select>
            </div>
            <div class="col-sm">
                <label class="restaurant" for="price">
                    Precio</label>
                <br>
                <select class="form-select" id="price">
                    <option value="1">Divergente</option>
                    <option value="2">Convergente</option>
                    <option value="3">Asimilador</option>
                    <option value="4">Acomodador</option>
                </select>
            </div>
            <div class="col-sm">
                <label class="restaurant" for="restauranteType">
                    Tipo de restaurante</label>
                <br>
                <select class="form-select" id="restauranteType">
                    <option value="1">Divergente</option>
                    <option value="2">Convergente</option>
                    <option value="3">Asimilador</option>
                    <option value="4">Acomodador</option>
                </select>
            </div>
        </div>
    </div>

    <div class="container">
        <div style="margin-top: 5%" class="row">
            <div class="col-sm">
                <label class="restaurant" for="closingTime">
                    Hora de cierre</label>
                <br>
                <select class="form-select" id="closingTime">
                    <option value="1">Divergente</option>
                    <option value="2">Convergente</option>
                    <option value="3">Asimilador</option>
                    <option value="4">Acomodador</option>
                </select>
            </div>
        </div>
    </div>
    <div style="margin-top: 100px">
        <input type="button" class="btn btn-danger" href="javascript:;" onclick="calculateRoutesRestaurant($('#initialDestination').val(),
                               $('#finalDestination').val(), $('#restaurantStars').val(),
                               $('#foodType').val(), $('#price').val(),
                               $('#restauranteType').val(), $('#closingTime').val());
                       return false;" id="calculateRoutesRestaurant" name="calculateRoutesRestaurant" value="Buscar" />
    </div>

    <div style="margin-top : 50px">
        <span style="color: #8b0000;" id="result"></span>
    </div>

</div>

<?php
include_once 'public/footerSections.php';
?>