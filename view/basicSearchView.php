<?php
$session = SSession::getInstance();
if (isset($session->role)) {
    header('location:?');
} else {
    include_once 'public/header.php';
}
?>

<style>
    .fullscreen-modal .modal-dialog {
        margin: 0;
        margin-right: auto;
        margin-left: auto;
        width: 100%;
    }
    @media (min-width: 768px) {
        .fullscreen-modal .modal-dialog {
            width: 850px;
        }
    }
    @media (min-width: 992px) {
        .fullscreen-modal .modal-dialog {
            width: 1070px;
        }
    }
    @media (min-width: 1200px) {
        .fullscreen-modal .modal-dialog {
            width: 1270px;
        }
    }
</style>

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

<button type="button" class="c-button b-40 bg-red-3 hv-red-3-o fl" data-toggle="modal" data-target="#myModal">
    Modal
</button>

<div class="modal fullscreen-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div>
    </div>
</div>

<div class="container">
    <form class="hotel-filter" onsubmit="send(); return false">
        <div class="baner-bar cars-bar">
            <div class="row">
                <div class="col-md-12">
                    <div class="hotels-block">
                        <h4>Localización</h4>
                        <select id="form-location" class="form-control">
                            <?php foreach ($vars['location'] as $value) { ?>
                                <option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>";
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <div class="hotels-block">
                        <h4>Atracción</h4>
                        <div class="input-style-1"> 
                            <select id="form-attraction" class="form-control">
                                <option value="-1">No importa</option>
                                <?php foreach ($vars['attraction'] as $value) { ?>
                                    <option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>";
                                <?php }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="hotels-block">
                        <h4>Tipo</h4>
                        <div class="input-style-1"> 
                            <select id="form-type" class="form-control">
                                <?php foreach ($vars['type'] as $value) { ?>
                                    <option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>";
                                <?php }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="hotels-block">
                        <h4>Calificación</h4>
                        <div class="input-style-1"> 
                            <select id="form-qualification" class="form-control">
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

<script>
    (function () {
        $("#menu-basic-search").addClass("active");
    })();

    function send() {
        var data = {
            'location': $('#form-location').val(),
            'qualification': $('#form-qualification').val(),
            'attraction': $('#form-attraction').val(),
            'type': $('#form-type').val()
        };

        $('#form-message').html("Espere...");

        $.post('?controller=Destiny&action=basicSearchViewData', {data}, function (response) {
            alert(JSON.stringify(response));

//            if (parseInt(data.result) === 1) {
//                $('#form-message').html("Se realizó el envió a su correo electrónico...");
//                setTimeout("location.href = '?';", 1000);
//            } else {
//                $('#form-message').html("Datos erróneos. Por favor, inténtelo otra vez.");
//                setTimeout("$('#form-message').html('');", 5000);
//            }
        }, 'JSON').fail(function () {
            alert("La solicitud a fallado!!!");
        });
    }
</script>

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
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;language=es&key=AIzaSyBT_bTr4NqhArVYWCSHkxM4qjruliItm_M"></script>	
<script src="public/js/map.js"></script>
