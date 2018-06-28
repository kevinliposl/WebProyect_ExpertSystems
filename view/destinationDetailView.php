<?php
$session = SSession::getInstance();
if (isset($session->role)) {
    if ($session->role === "adm") {
        header('location:?');
    } else {
        include_once 'public/header_usr.php';
    }
} else {
    include_once 'public/header.php';
}
?>
<br>
<br>
<div class="detail-wrapper">
    <div class="container">
        <div class="detail-header">
            <div class="row">
                <div class="col-xs-12 col-sm-8">
                    <!--<div class="detail-category color-grey-3">Turrialba, Cartago.</div>-->
                    <h2 class="detail-title color-dark-2"><?= $vars['destiny']['destination_name']; ?></h2>
                    <div class="detail-rate rate-wrap clearfix">
                        <div class="rate">
                            <?php for ($index = 0; $index < $vars['destiny']['destination_stars']; $index++) { ?>
                                <span class="fa fa-star color-yellow"></span>
                            <?php } ?>
                        </div>
                        <i>Visto por <?= rand(10, 100) ?> usuarios</i> 
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="detail-price color-dark-2">Servicios desde <span class="color-dr-blue"> &#162;<?= $vars['destiny']['destination_price']; ?></span></div>
                </div>
            </div>
       	</div>
       	<div class="row">
            <div class="col-xs-12 col-md-8">
                <div class="detail-content color-1">
                    <div class="detail-content-block">
                        <p style="text-align:justify;">
                            <?= $vars['destiny']['destination_description']; ?>
                        </p>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="<?= $vars['destiny']['destination_url_video']; ?>"></iframe>
                        </div>
                    </div>									
                </div>       			
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="right-sidebar">
                    <div class="detail-block bg-dr-blue">
                        <h4 class="color-white">Detalles y Facilidades</h4>
                        <div class="details-desc">
                            <br>
                            <?php foreach ($vars['facilities'] as $value) { ?>
                                <p class="color-grey-9"><?= $value['facilities']?></p>
                            <?php } ?>
                            <br>
                        </div>
                    </div>										      				
                </div>       			
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="main-wraper bg-grey-2">
        <div class="map-block">
            <div id="map-canvas" class="style-2" data-lat="<?= $vars['destiny']['destination_latitude']; ?>" data-lng="<?= $vars['destiny']['destination_longitude']; ?>" data-zoom="10" data-style="2"></div>
            <div class="addresses-block">
                <a data-lat="<?= $vars['destiny']['destination_latitude']; ?>" data-lng="<?= $vars['destiny']['destination_longitude']; ?>" data-string="<?= $vars['destiny']['destination_name']; ?>"></a>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'public/footer.php';
?>

<script src="public/js/jquery.circliful.min.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?amp;language=es&key=AIzaSyBT_bTr4NqhArVYWCSHkxM4qjruliItm_M"></script>	
<script src="public/js/map.js"></script>