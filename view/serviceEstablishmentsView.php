
<?php
include_once 'public/headerSections.php';
?>
<div class="container text-center">

    <h2 id="titles">
        Establecimientos de servicio</h2>

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
        </div>
        <div style="margin-top: 100px">
            <input type="button" class="btn btn-danger" href="javascript:;" onclick="calculateServiceEstablishments($('#startingPoint').val());
                return false;" id="calculateServiceEstablishments" name="calculateServiceEstablishments" value="Buscar" />

        </div>
        <div id="spinner"></div>
        <div style="margin-top : 50px">
            <span style="color: #8b0000;" id="result"></span>
        </div>

    
</div>
<?php
include_once 'public/footerSections.php';
?>