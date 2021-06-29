
<?php
include_once 'public/headerSections.php';
?>
<div class="container text-center">

    <h2 id="titles">
        Te recomedaremos establecimientos de servicio</h2>

    <div class="container">

        <div class="row">
            <div class="col-sm">
                <label class="restaurant" for="startingPoint">
                    Punto de partida</label>
                <br>
                <select class="form-select" id="startingPoint">
                    <option value="Cartago">Cartago</option>
                    <option value="Heredia">Heredia</option>
                    <option value="San_Jose">San José</option>
                    <option value="Alajuela">Alajuela</option>
                </select>
            </div>
            <div class="col-sm">
                <label class="restaurant" for="road_type">
                    Tipo de carretera</label>
                <br>
                <select class="form-select" id="road_type">
                    <option value="Pavement">Pavimento</option>
                    <option value="Sandroad">Lastre</option>
                    <option value="Stone">Piedra</option>
                </select>
            </div>              
        </div>
        <div style="margin-top: 100px">
            <input type="button" class="btn btn-danger" href="javascript:;" onclick="calculateServiceEstablishments($('#startingPoint').val(),
            $('#road_type').val());
                    return false;" id="calculateServiceEstablishments" name="calculateServiceEstablishments" value="Buscar" />

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
