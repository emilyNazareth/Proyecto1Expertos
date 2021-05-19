
<?php
include_once 'public/headerSections.php';
?>
<div class="container text-center">

    <h2 id="titles">
        Búsqueda por tipo de camino</h2>

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
                <label class="restaurant" for="finalDestination">
                    Tipo de camino</label>
                <br>
                <select class="form-select" id="typeOfRoad">
                    <option value="1">Carretera</option>
                    <option value="2">Lastre</option>
                    <option value="3">Callejón</option>
                </select>
            </div>
        </div>
        <div style="margin-top: 100px">
            <input type="button" class="btn btn-danger" href="javascript:;" onclick="calculateTypeOfRoad($('#startingPoint').val(),
                            $('#finalDestination').val(), $('#typeOfRoad').val());
                    return false;" id="calculateTypeOfRoad" name="calculateTypeOfRoad" value="Buscar" />

        </div>
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
