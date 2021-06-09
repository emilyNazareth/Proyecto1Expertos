<?php
include_once 'public/headerSections.php';
?>
<div class="container text-center">

    <h2 id="titles">
        Búsqueda por restaurante</h2>

    <div class="container">

        <div class="row">
            <div class="col-sm">
                <label class="restaurant" for="initialDestination">
                    Punto de partida</label>
                <br>
                <select class="form-select" id="initialDestination">
                    <option value="1">Cartago</option>
                    <option value="2">Turrialba</option>
                    <option value="3">San José</option>
                    <option value="4">Cervantes</option>
                </select>
            </div>
            <div class="col-sm">
                <label class="restaurant" for="finalDestination">
                    Punto de llegada</label>
                <br>
                <select class="form-select" id="finalDestination">
                    <option value="1">Turrialba</option>
                    <option value="2">Cervantes</option>
                    <option value="3">San José</option>
                    <option value="4">Cartago</option>
                </select>
            </div>
            <div class="col-sm">
                <label class="restaurant" for="closingTime">
                    Hora de cierre</label>
                <br>
                <select class="form-select" id="closingTime">
                    <option value="1">5:00 pm</option>
                    <option value="1">6:00 pm</option>
                    <option value="2">7:00 pm</option>
                    <option value="3">8:00 pm</option>
                    <option value="4">9:00 pm</option>
                </select>
            </div>
            
        </div>
    </div>
    <div class="container">
        <div style="margin-top: 5%" class="row">
            <div class="col-sm">
                <label class="restaurant" for="duration">
                    Duración</label>
                <br>
                <select class="form-select" id="duration">
                    <option value="1">Menos de 1 hora</option>
                    <option value="2">De una a dos horas</option>
                    <option value="3">Más de dos horas</option>
                </select>
            </div>
            <div class="col-sm">
                <label class="restaurant" for="price">
                    Precio</label>
                <br>
                <select class="form-select" id="price">
                    <option value="1">Barato</option>
                    <option value="2">Regular</option>
                    <option value="3">Caro</option>
                </select>
            </div>
            <div class="col-sm">
                <label class="restaurant" for="distance">
                    Distancia</label>
                <br>
                <select class="form-select" id="distance">
                    <option value="1">Menos de 25 Km</option>
                    <option value="2">De 25 a 50 Km </option>
                    <option value="3">Más de 50 Km</option>
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
    <div id="spinner"></div>
    <div style="margin-top : 50px; margin-bottom: 5%;">
        <span style="color: #8b0000;" id="result"></span>
    </div>

    <div class="card-deck" id="sites">

    </div>

    



</div>

<?php
include_once 'public/footerSections.php';
?>