
<?php
include_once 'public/headerSections.php';
?>
<div class="container text-center">

    <h2 id="titles">
        Sitios Recomendados</h2>

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
                <label class="restaurant" for="finalDestination">
                    Punto de llegada</label>
                <br>
                <select class="form-select" id="finalDestination">
                    <option value="Cartago">Cartago</option>
                    <option value="Heredia">Heredia</option>
                    <option value="San_Jose">San José</option>
                    <option value="Alajuela">Alajuela</option>
                </select>
            </div>
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
        <div style="margin-top: 100px">
            <input type="button" class="btn btn-danger" href="javascript:;" onclick="calculateRecommendedSite($('#startingPoint').val(),
                            $('#finalDestination').val(),$('#duration').val(),$('#distance').val());
                    return false;" id="calculateRecommendedSite" name="calculateRecommendedSite" value="Buscar" />

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
