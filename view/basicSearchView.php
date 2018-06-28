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

<!--<button type="button" class="c-button b-40 bg-red-3 hv-red-3-o fl" data-toggle="modal" data-target="#myModal">
    Modal
</button>

<div class="modal fullscreen-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>-->

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
                        <input class="c-button b-60 bg-white hv-orange" id="reload-map" type="submit" value="Buscar Ahora">
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

    $('#reload-map').on('click', function () {
        setTimeout(function () {
            initialize();
        }, 500);
    });

    function send() {
        var data = {
            'location': $('#form-location').val(),
            'qualification': $('#form-qualification').val(),
            'attraction': $('#form-attraction').val(),
            'type': $('#form-type').val()
        };

        $('#form-message').html("Espere...");

        $.post('?controller=Destiny&action=basicSearchViewData', data, function (response) {
            var i = 4;
            var tmp = 0;
            var string_data = "";
            var string_address = "";
            //element.destination_id;
            //destination_name
            //destination_description
            //destination_url_video
            //destination_url_photo
            //destination_latitude
            //destination_longitude
            //destination_stars
            //destination_price

            $("#form-search-result").html("");
            $("#count-result").html(response.length + " Resultados");

            response.forEach(function (element) {
                if ((i % 4) === 0) {
                    tmp = i + 3;
                    string_data += "<div class='row'>";
                }
                string_data += "<div class='col-md-3 col-sm-6 col-xs-12'>";
                string_data += "<div class='hotel-item style-7'>";
                string_data += "<div class='radius-top'>";
                string_data += "<img style='max-width:100%; max-height:100%; height:35%' src='" + element.destination_url_photo + "'alt=''/>";
                string_data += "</div>";
                string_data += "<div class='title'>";
                string_data += "<h5>Servicios desde";
                string_data += "<strong class='color-red-3'> &#36;" + element.destination_price + "</strong> / persona</h5>";
                string_data += "<h4>";
                string_data += "<b>" + element.destination_name + "</b>";
                string_data += "</h4>";
                string_data += "<p></p>";
                string_data += "<div class='clearfix'>";
                string_data += "<a href='?controller=Destiny&action=destinationDetail&id=" + element.destination_id + "'";
                string_data += "target='_blank' class='c-button b-40 bg-red-3 hv-red-3-o fl'>Ver más</a>";
                string_data += "</div></div></div></div>";

                if (i === tmp) {
                    string_data += "</div><br>";
                }
                i++;
            });
            if (i !== tmp) {
                string_data += "</div>";
            }
            $("#form-search-result").html(string_data);
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
                    <h2 id="count-result"></h2>
                </div>
            </div>
        </div>
        <div id="form-search-result">

        </div>
    </div>
</div>

<?php
include_once 'public/footer.php';
?>

<script src="public/js/jquery.circliful.min.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?amp;language=es&key=AIzaSyBT_bTr4NqhArVYWCSHkxM4qjruliItm_M"></script>	
<script src="public/js/map.js"></script>