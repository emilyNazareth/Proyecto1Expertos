<?php
include_once 'public/headerSections.php';
?>
<div class="container text-center">

    <h2 id="titles">
        Búsqueda por Hotel</h2>

    <div class="container">

        <div class="row">
            <div class="col-sm">
                <label class="restaurant" for="startingPoint">
                    Punto de partida</label>
                <br>
                <select class="form-select" id="startingPoint">
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
                <label class="restaurant" for="hotelStars">
                    Estrellas</label>
                <br>
                <select class="form-select" id="hotelStars">
                    <option value="1">1 a 2 estrellas</option>
                    <option value="2">3 estrellas</option>
                    <option value="3">4 estrellas</option>
                    <option value="4">5 estrellas</option>
                </select>
            </div>
        </div>
    </div>
    <div class="container">
        <div style="margin-top: 5%" class="row">
            <div class="col-sm">
                <label class="restaurant" for="hotelType">
                    Tipo de Hotel</label>
                <br>
                <select class="form-select" id="hotelType">
                    <option value="1">Montaña</option>
                    <option value="2">Playa</option>
                    <option value="3">Ciudad</option>
                </select>
            </div>
            <div class="col-sm">
                <label class="restaurant" for="hotelPrice">
                    Precio</label>
                <br>
                <select class="form-select" id="hotelPrice">
                    <option value="1">Barato</option>
                    <option value="2">Regular</option>
                    <option value="3">Caro</option>
                </select>
            </div>
            <div class="col-sm">
                <label class="restaurant" for="hotelFacility">
                    Facilidad</label>
                <br>
                <select class="form-select" id="hotelFacility">
                    <option value="1">Piscina</option>
                    <option value="2">Jardín</option>
                    <option value="2">Restaurante</option>
                </select>
            </div>
        </div>
    </div>

   
    <div style="margin-top: 100px">
        <input type="button" class="btn btn-danger" href="javascript:;" onclick="calculateRoutesHotel($('#startingPoint').val(),
                               $('#finalDestination').val(), $('#hotelStars').val(),
                               $('#hotelType').val(), $('#hotelPrice').val(),
                               $('#hotelFacility').val());
                       return false;" id="calculateRoutesRestaurant" name="calculateRoutesRestaurant" value="Buscar" />

    </div>
    <div id="spinner"></div>
    <div style="margin-top : 50px">
        <span style="color: #8b0000;" id="result"></span>
    </div>

</div>

<?php
include_once 'public/footerSections.php';
?>