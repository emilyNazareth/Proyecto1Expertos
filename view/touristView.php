<?php
include_once 'public/headerSections.php';
?>
<div class="container text-center">

    <h2 id="titles">
        Tipo de Turista</h2>

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
                <label class="restaurant" for="typeTourist">
                    Tipo de turista</label>
                <br>
                <select class="form-select" id="typeTourist">
                    <option value="1">Aventurero</option>
                    <option value="2">Reservado</option>
                    <option value="3">Extrovertido</option>
                    <option value="4">Culturales</option>
                </select>
            </div>
        </div>
    </div>
    <div class="container">
        <div style="margin-top: 5%" class="row">
            <div class="col-sm">
                <label class="restaurant" for="ageRange">
                    Rango de edad</label>
                <br>
                <select class="form-select" id="ageRange">
                    <option value="1">0-17</option>
                    <option value="2">18-29</option>
                    <option value="3">30-49</option>
                    <option value="4">50-100</option>
                </select>
            </div>
            <div class="col-sm">
                <label class="restaurant" for="budget">
                    Presupuesto</label>
                <br>
                <select class="form-select" id="budget">
                    <option value="1">Bajo</option>
                    <option value="2">Medio</option>
                    <option value="3">Alto</option>
                </select>
            </div>
        </div>
    </div>


    <div style="margin-top: 100px">
        <input type="button" class="btn btn-danger" href="javascript:;" onclick="calculateRoutesTourist($('#startingPoint').val(),
                        $('#typeTourist').val(), $('#ageRange').val(),
                        $('#budget').val());
                return false;" id="calculateRoutesTourist" name="calculateRoutesTourist" value="Buscar" />

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