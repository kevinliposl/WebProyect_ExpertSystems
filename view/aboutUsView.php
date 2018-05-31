<?php
$session = SSession::getInstance();
if (isset($session->role)) {
    if ($session->role === "adm") {
        include_once 'public/header_adm.php';
    } else {
        include_once 'public/header_usr.php';
    }
} else {
    include_once 'public/header.php';
}
?>

<script>
    (function () {
        document.getElementById("menu-about-us").classList.add("active");
    })();
</script>

<div class="map-block">
    <div id="map-canvas" class="style-4" data-lat="9.903737" data-lng="-83.670832" data-zoom="10" data-style="2"></div>
    <div class="addresses-block">
        <a data-lat="9.903737" data-lng="-83.670832" data-string="Universidad de Costa Rica, Sede del Atlántico, Turrialba, Cartago"></a>
    </div>
</div>

<div class="main-wraper">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                <div class="second-title">
                    <h4 class="subtitle color-dr-blue-2 underline">Informaci&oacute;n de Contacto</h4>
                    <h2>Toca para obtener</h2>
                </div>
            </div>
        </div>
        <div class="contact-row">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="contact-entry">
                        <img class="contact-icon" src="public/img/loc_icon_2_dark.png" alt="">
                        <div class="contact-label color-grey-3">Dirección:</div>
                        <div class="contact-text color-dark-2">Universidad de Costa Rica, Sede del Atlántico,<br> Provincia de Cartago, Turrialba</div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="contact-entry">
                        <img class="contact-icon" src="public/img/mail_icon_l_dark.png" alt="">
                        <div class="contact-label color-grey-3">Correo Electrónico:</div>
                        <a class="contact-text color-dark-2 link-dr-blue-2" href="mailto:kevinliposl@gmail.com&brogudbarrientos@gmail.com">kevinliposl@gmail.com <br> brogudbarrientos@gmail.com</a>
                    </div>
                </div>		
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
