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

<div class="detail-wrapper">
    <div class="container">
        <div class="detail-header">
            <div class="row">
                <div class="col-xs-12 col-sm-8">
                    <div class="detail-category color-grey-3">Turrialba, Cartago.</div>
                    <h2 class="detail-title color-dark-2">Turrialtico</h2>
                    <div class="detail-rate rate-wrap clearfix">
                        <div class="rate">
                            <span class="fa fa-star color-yellow"></span>
                            <span class="fa fa-star color-yellow"></span>
                            <span class="fa fa-star color-yellow"></span>
                            <span class="fa fa-star color-yellow"></span>
                        </div>
                        <i>Visto por 485 usuarios</i> 
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="detail-price color-dark-2">Servicios desde <span class="color-dr-blue"> &#162;1000</span></div>
                </div>
            </div>
       	</div>
       	<div class="row">
            <div class="col-xs-12 col-md-8">
                <div class="detail-content color-1">
                    <div class="detail-content-block">
                        <h3>Información general de destino</h3>
                        <p style="text-align:justify;">
                            Turrialtico Lodge is built with beautiful rustic wood. The hotel balcony offers the best panoramic views of the Turrialba valley, the Turrialba Volcano and the Talamanca mountain range. The hotel is surrounded by gorgeous tropical gardens that nest a wide variety of birds, making Turrialtico an excellent spot for birdwatching.
                        </p>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/yS4P-fRwB50"></iframe>
                        </div>
                    </div>									
                </div>       			
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="right-sidebar">
                    <div class="detail-block bg-dr-blue">
                        <h4 class="color-white">Detalles y Facilidades</h4>
                        <div class="details-desc">
                            <p class="color-grey-9">Televisión por cable: <span class="color-white">Si</span></p>
                            <p class="color-grey-9">Teléfono: <span class="color-white">Si</span></p>
                            <p class="color-grey-9">Acceso: <span class="color-white">Medio</span></p>
                            <p class="color-grey-9">Internet: <span class="color-white">No</span></p>
                            <p class="color-grey-9">Minibar: <span class="color-white">No</span></p>
                            <p class="color-grey-9">Restaurante: <span class="color-white">Si</span></p>
                            <p class="color-grey-9">Transporte: <span class="color-white">Si</span></p>
                            <p class="color-grey-9">Asistencia: <span class="color-white">Si</span></p>
                            <p class="color-grey-9">Hospedaje: <span class="color-white">Si</span></p>
                            <p class="color-grey-9">Espacio para niños: <span class="color-white">No</span></p>
                            <div class="details-btn">
                                <a href="#" class="c-button b-40 bg-white hv-transparent"><span>Votar ahora!</span></a>
                            </div>
                            <br>
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
            <div id="map-canvas" class="style-2" data-lat="9.907419" data-lng="-83.684106" data-zoom="10" data-style="2"></div>
            <div class="addresses-block">
                <a data-lat="9.907419" data-lng="-83.684106" data-string="Avenida 6"></a>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'public/footer.php';
?>

<script src="public/js/jquery.circliful.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false&amp;language=en&key=AIzaSyBT_bTr4NqhArVYWCSHkxM4qjruliItm_M"></script>	
<script src="public/js/map.js"></script>
