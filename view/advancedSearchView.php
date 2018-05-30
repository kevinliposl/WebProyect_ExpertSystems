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
        var element = document.getElementById("menu-advanced-search");
        element.classList.add("active");
    })();
</script>

<div class="top-baner header2-baner">
    <div id="map-canvas" class="style-1" data-lat="9.353737" data-lng="-83.970832" data-zoom="8" data-style="2"></div>
    <div class="addresses-block">
        <a data-lat="9.907419" data-lng="-83.684106" data-string="Avenida 6"></a>
    </div>
    <div class="addresses-block">
        <a data-lat="9.897069" data-lng="-83.640295" data-string="Turrialtico"></a>
    </div>
    <div class="addresses-block">
        <a data-lat="9.975480" data-lng="-83.690303" data-string="Monumento Nacional Guayabo"></a>
    </div>
    <div class="addresses-block">
        <a data-lat="9.896695" data-lng="-83.738609" data-string="Restaurante El Clon"></a>
    </div>
    <div class="addresses-block">
        <a data-lat="9.897604" data-lng="-83.781953" data-string="Bocadito del Cielo"></a>
    </div>
    <div class="addresses-block">
        <a data-lat="9.863867" data-lng="-83.824541" data-string="Mirador Valle Nuevo. Bar y Restaurante"></a>
    </div>
    <div class="addresses-block">
        <a data-lat="9.832540" data-lng="-83.804285" data-string="Hotel y Restaurante La Casona del Cafetal"></a>
    </div>
    <div class="addresses-block">
        <a data-lat="9.884895" data-lng="-83.807375" data-string="Molinos de Viento"></a>
    </div>
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
                <div class="col-md-3">
                    <div class="hotels-block">
                        <h4>Atracción</h4>
                        <div class="input-style-1"> 
                            <select class="form-control">
                                <option>No importa</option>
                                <option>Parques Nacionales</option>
                                <option>Ruinas y Lugares Históricos</option>
                                <option>Galerías y Museos</option>
                                <option>Jardines botánicos y zoológicos</option>
                                <option>Miradores</option>
                                <option>Hotel</option>
                                <option>Restaurante</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="hotels-block">
                        <h4>Tipo</h4>
                        <div class="input-style-1"> 
                            <select class="form-control">
                                <option>No importa</option>
                                <option>Rural</option>
                                <option>Urbana</option>
                                <option>Costera</option>
                                <option>De Montaña</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="hotels-block">
                        <h4>Calificación</h4>
                        <div class="input-style-1"> 
                            <select class="form-control">
                                <option>No importa</option>
                                <option>Una Estrella</option>
                                <option>Dos Estrella</option>
                                <option>Tres Estrella</option>
                                <option>Cuatro Estrella</option>
                                <option>Cinco Estrella</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group hotels-block">
                        <h4>Facilidades</h4>
                        <div class="input-style-1"> 
                            <select multiple class="form-control">
                                <option>No importa</option>
                                <option>Televisión por cable</option>
                                <option>Teléfono</option>
                                <optgroup label="Acceso">
                                    <option>Facil</option>
                                    <option>Medio</option>
                                    <option>Dificil</option>
                                </optgroup>
                                <option>Internet</option>
                                <option>Bar</option>
                                <option>Restaurante</option>
                                <option>Transporte</option>
                                <option>Hospedaje</option>
                                <option>Espacio para niños</option>
                                <option>Asistencia</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="range-wrapp">
                        <h4>Rango de Precios</h4>
                        <div class="slider-range" data-counter="&#162;" data-position="start" data-from="0" data-to="5000" data-min="0" data-max="5000">
                            <div class="range"></div>
                            <input type="text" class="amount-start" readonly value="&#162;0">
                            <input type="text" class="amount-end" readonly value="&#162; 1500">
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
        <div class="row" style="padding-top: 50px;">
            <div class="col-md-12">
                <div class="second-title">
                    <h2>Búsqueda (8)</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="hotel-item style-7">
                    <div class="radius-top">
                        <img src="public/img/home_10/tour_1.jpg" alt="">
                    </div>
                    <div class="title">
                        <h5>Servicios desde
                            <strong class="color-red-3">&#162;1000</strong> / persona</h5>
                        <h6 class="color-grey-3">Turrialba, Cartago</h6>
                        <h4>
                            <b>Molinos de Viento</b>
                        </h4>
                        <p></p>
                        <div class="clearfix">
                            <a href="?action=destinationDetail" target="_blank" class="c-button b-40 bg-red-3 hv-red-3-o fl">Ver más</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="hotel-item style-7">
                    <div class="radius-top">
                        <img src="public/img/home_10/tour_1.jpg" alt="">
                    </div>
                    <div class="title">
                        <h5>Servicios desde
                            <strong class="color-red-3">&#162;1000</strong> / persona</h5>
                        <h6 class="color-grey-3">Turrialba, Cartago</h6>
                        <h4>
                            <b>Hotel y Restaurante La Casona del Cafetal</b>
                        </h4>
                        <p></p>
                        <div class="clearfix">
                            <a href="?action=destinationDetail" target="_blank" class="c-button b-40 bg-red-3 hv-red-3-o fl">Ver más</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="hotel-item style-7">
                    <div class="radius-top">
                        <img src="public/img/home_10/tour_1.jpg" alt="">
                    </div>
                    <div class="title">
                        <h5>Servicios desde
                            <strong class="color-red-3">&#162;1000</strong> / persona</h5>
                        <h6 class="color-grey-3">Turrialba, Cartago</h6>
                        <h4>
                            <b>Mirador Valle Nuevo. Bar y Restaurante</b>
                        </h4>
                        <p></p>
                        <div class="clearfix">
                            <a href="?action=destinationDetail" target="_blank" class="c-button b-40 bg-red-3 hv-red-3-o fl">Ver más</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="hotel-item style-7">
                    <div class="radius-top">
                        <img src="public/img/home_10/tour_1.jpg" alt="">
                    </div>
                    <div class="title">
                        <h5>Servicios desde
                            <strong class="color-red-3">&#162;1000</strong> / persona</h5>
                        <h6 class="color-grey-3">Turrialba, Cartago</h6>
                        <h4>
                            <b>Restaurante El Clon</b>
                        </h4>
                        <p></p>
                        <div class="clearfix">
                            <a href="?action=destinationDetail" target="_blank" class="c-button b-40 bg-red-3 hv-red-3-o fl">Ver más</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="hotel-item style-7">
                    <div class="radius-top">
                        <img src="public/img/home_10/tour_1.jpg" alt="">
                    </div>
                    <div class="title">
                        <h5>Servicios desde
                            <strong class="color-red-3">&#162;1000</strong> / persona</h5>
                        <h6 class="color-grey-3">Turrialba, Cartago</h6>
                        <h4>
                            <b>Avenida 6</b>
                        </h4>
                        <p></p>
                        <div class="clearfix">
                            <a href="?action=destinationDetail" target="_blank" class="c-button b-40 bg-red-3 hv-red-3-o fl">Ver más</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="hotel-item style-7">
                    <div class="radius-top">
                        <img src="public/img/home_10/tour_1.jpg" alt="">
                    </div>
                    <div class="title">
                        <h5>Servicios desde
                            <strong class="color-red-3">&#162;1000</strong> / persona</h5>
                        <h6 class="color-grey-3">Turrialba, Cartago</h6>
                        <h4>
                            <b>Turrialtico Lodge</b>
                        </h4>
                        <p></p>
                        <div class="clearfix">
                            <a href="?action=destinationDetail" target="_blank" class="c-button b-40 bg-red-3 hv-red-3-o fl">Ver más</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="hotel-item style-7">
                    <div class="radius-top">
                        <img src="public/img/home_10/tour_1.jpg" alt="">
                    </div>
                    <div class="title">
                        <h5>Servicios desde
                            <strong class="color-red-3">&#162;1000</strong> / persona</h5>
                        <h6 class="color-grey-3">Turrialba, Cartago</h6>
                        <h4>
                            <b>Monumento Nacional Guayabo</b>
                        </h4>
                        <p></p>
                        <div class="clearfix">
                            <a href="?action=destinationDetail" target="_blank" class="c-button b-40 bg-red-3 hv-red-3-o fl">Ver más</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="hotel-item style-7">
                    <div class="radius-top">
                        <img src="public/img/home_10/tour_1.jpg" alt="">
                    </div>
                    <div class="title">
                        <h5>Servicios desde
                            <strong class="color-red-3">&#162;1000</strong> / persona</h5>
                        <h6 class="color-grey-3">Turrialba, Cartago</h6>
                        <h4>
                            <b>Bar Chavelo's</b>
                        </h4>
                        <p></p>
                        <div class="clearfix">
                            <a href="?action=destinationDetail" target="_blank" class="c-button b-40 bg-red-3 hv-red-3-o fl">Ver más</a>
                        </div>
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
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;language=en&key=AIzaSyBT_bTr4NqhArVYWCSHkxM4qjruliItm_M"></script>	
<script src="public/js/map.js"></script>

