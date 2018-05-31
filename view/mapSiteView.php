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

<div class="main-wraper">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                <div class="second-title">
                    <h4>Mapa del Sitio</h4>
                    <img class="image" src="public/img/mapa.png" alt="">
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
