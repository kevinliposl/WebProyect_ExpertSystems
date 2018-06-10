<?php
$session = SSession::getInstance();
if (isset($session->role)) {
    header('location:?');
} else {
    include_once 'public/header.php';
}
?>
<script>
    (function () {
        $("#menu-basic-search").addClass("active");
    })();
</script>

<div class="top-baner header2-baner">
    <div id="map-canvas" class="style-1" data-lat="9.353737" data-lng="-83.970832" data-zoom="8" data-style="2"></div>
    <?php
    foreach ($vars['destiny'] as $value) {
        $tmpLat = $value['latitude'];
        $tmpLon = $value['longitude'];
        $tmpName = $value['name'];
        echo "<div class='addresses-block'>";
        echo "<a data-lat='$tmpLat' data-lng='$tmpLon' data-string='$tmpName'></a>";
        echo "</div>";
    }
    ?>
</div>

<div class="container">
    <form action="#" class="hotel-filter">
        <div class="baner-bar cars-bar">
            <div class="row">
                <div class="col-md-12">
                    <div class="hotels-block">
                        <h4>Localización</h4>
                        <div class="ui-widget input-style-1">
                            <img src="public/img/loc_icon_small_grey.png" alt="">
                            <input  type="text" placeholder="Destino" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="hotels-block">
                        <h4>Atracción</h4>
                        <div class="input-style-1"> 
                            <select class="form-control">
                                <option value="-1">No importa</option>
                                <?php
                                foreach ($vars['attraction'] as $value) {
                                    $tmpId = $value['id'];
                                    $tmpName = $value['name'];
                                    echo "<option value = '$tmpId'>$tmpName</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="hotels-block">
                        <h4>Tipo</h4>
                        <div class="input-style-1"> 
                            <select class="form-control">
                                <option>No importa</option>
                                <?php
                                foreach ($vars['type'] as $value) {
                                    $tmpId = $value['id'];
                                    $tmpName = $value['name'];
                                    echo "<option value = '$tmpId'>$tmpName</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="hotels-block">
                        <h4>Calificación</h4>
                        <div class="input-style-1"> 
                            <select class="form-control">
                                <option value="-1">No importa</option>
                                <option value="1">Una Estrella</option>
                                <option value="2">Dos Estrellas</option>
                                <option value="3">Tres Estrellas</option>
                                <option value="4">Cuatro Estrellas</option>
                                <option value="5">Cinco Estrellas</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="submit">
                        <input class="c-button b-60 bg-white hv-orange" type="submit" value="Buscar Ahora">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>  

<div class="main-wraper hotel-items">
    <div class="container">
        <div class="row" style="padding-top: 20px;
             ">
            <div class="col-md-12">
                <div class="second-title">
                    <h2>Resultados <?php echo count($vars['destiny']); ?></h2>
                </div>
            </div>
        </div>
        <?php
        $i = 4;
        $tmp = 0;
        foreach ($vars['destiny'] as $value) {
            if (($i % 4) == 0) {
                $tmp = $i + 3;
                echo "<div class='row'>";
            }
            ?>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="hotel-item style-7">
                    <div class="radius-top">
                        <img style="height: 100%; width: 100%; max-width: 100%; max-height: 100%;" src="<?php echo trim($value['url_photo']); ?>" alt="">
                    </div>
                    <div class="title">
                        <h5>Servicios desde
                            <strong class="color-red-3">&#36;<?php echo trim($value['price']); ?></strong> / persona</h5>
                        <h6 class="color-grey-3"><?php echo trim($value['location']); ?></h6>
                        <h4>
                            <b><?php echo trim($value['name']); ?></b>
                        </h4>
                        <p></p>
                        <div class="clearfix">
                            <a href="?action=destinationDetail" target="_blank" class="c-button b-40 bg-red-3 hv-red-3-o fl">Ver más</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if ($i == $tmp) {
                echo "</div>";
            }
            $i++;
        }
        ?>
    </div>
</div>

<?php
include_once 'public/footer.php';
?>
<script src="public/js/jquery.circliful.min.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;language=en&key=AIzaSyBT_bTr4NqhArVYWCSHkxM4qjruliItm_M"></script>	
<script src = "public/js/map.js"></script>

