<?php
include_once 'public/headerSections.php';
?>
<h2 id="titleSiteAddress">Ruta para llegar a tu destino</h2>
<h5 id="descriptionSiteAddress">Este destino es uno de los favoritos, esperamos que disfrutes tu viaje</h5>
<div class="container">
    <div class="row">
        <div class="col-sm">
            <section class="mapDetail">
                <center>
                   <iframe src=<?php echo $vars['iframe']; ?>></iframe>                    
                </center>
            </section>
        </div>
    </div>
</div>


<?php
include_once 'public/footerSections.php';
?>