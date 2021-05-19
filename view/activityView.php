<?php
include_once 'public/headerSections.php';
?>
<div class="container text-center">

    <h2 id="titles">
        Búsqueda por Actividad</h2>

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
                    Destino</label>
                <br>
                <select class="form-select" id="finalDestination">
                    <option value="1">Turrialba</option>
                    <option value="2">Cervantes</option>
                    <option value="3">San José</option>
                    <option value="4">Cartago</option>
                </select>
            </div>
            <div class="col-sm">
                <label class="restaurant" for="activityRequirement">
                    Requerimiento</label>
                <br>
                <select class="form-select" id="activityRequirement">
                    <option value="1">Sólo mayores de edad</option>
                    <option value="2">Todo público</option>
                    <option value="3">Seguro Médico</option>
                </select>
            </div>
        </div>
    </div>
    <div class="container">
        <div style="margin-top: 5%" class="row">
            <div class="col-sm">
                <label class="restaurant" for="activityType">
                    Tipo de Activiad</label>
                <br>
                <select class="form-select" id="activityType">
                    <option value="1">Montaña</option>
                    <option value="2">Playa</option>
                    <option value="3">Ciudad</option>
                </select>
            </div>
            <div class="col-sm">
                <label class="restaurant" for="activityPrice">
                    Precio</label>
                <br>
                <select class="form-select" id="activityPrice">
                    <option value="1">Barato</option>
                    <option value="2">Regular</option>
                    <option value="3">Caro</option>
                </select>
            </div>
            <div class="col-sm">
                <label class="restaurant" for="activityModality">
                    Modalidad</label>
                <br>
                <select class="form-select" id="activityModality">
                    <option value="1">Diurna</option>
                    <option value="2">Nocturna</option>
                </select>
            </div>
        </div>
        <div style="margin-top: 5%" class="row">
            <div class="col-sm">
                <label class="restaurant" for="activityDuration">
                    Duración</label>
                <br>
                <select class="form-select" id="activityDuration">
                    <option value="1">menos de 1 hora</option>
                    <option value="2">de 1 a 3 horas</option>
                    <option value="3">mas de 3 horas</option>
                </select>
            </div>
        </div>
    </div>

   
    <div style="margin-top: 100px">
        <input type="button" class="btn btn-danger" href="javascript:;" onclick="calculateRoutesActivity($('#startingPoint').val(),
                               $('#finalDestination').val(), $('#activityRequirement').val(),
                               $('#activityType').val(), $('#activityPrice').val(),
                               $('#activityModality').val(),$('#activityDuration').val());
                       return false;" id="calculateRoutesRestaurant" name="calculateRoutesRestaurant" value="Buscar" />

    </div>
    <div id="spinner"></div>
    <div style="margin-top : 50px">
        <span style="color: #8b0000;" id="result"></span>
    </div>
    <div class="card-deck" id="sites">

    </div>

</div>

<?php
include_once 'public/footerSections.php';
?>