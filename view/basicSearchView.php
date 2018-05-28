<?php
include_once 'public/header.php';
?>
<link href="public/css/DateTimePicker.min.css" rel="stylesheet" type="text/css" />

<script>
    (function () {
        var element = document.getElementById("menu-basic-search");
        element.classList.add("active");
    })();
</script>

<div class="top-baner header2-baner">
    <div id="map-canvas" class="style-1" data-lat="9.353737" data-lng="-83.970832" data-zoom="8" data-style="2"></div>
    <div class="addresses-block">
        <a data-lat="48.858859" data-lng="2.3475569" data-string="Santa Monica Hotel"></a>
    </div>
    <div class="addresses-block">
        <a data-lat="55.0252449" data-lng="10.0224692" data-string="Beverly Hills Hotel"></a>
    </div>
    <div class="addresses-block">
        <a data-lat="28.6454415" data-lng="77.0907573" data-string="Los Angeles Hotel"></a>
    </div>
    <div class="addresses-block">
        <a data-lat="36.5217189" data-lng="139.0319492" data-string="Downey Hotel"></a>
    </div>
    <div class="addresses-block">
        <a data-lat="33.6054149" data-lng="-112.125051" data-string="Downey Hotel"></a>
    </div>
    <div class="addresses-block">
        <a data-lat="26.527387" data-lng="-83.9892645" data-string="Downey Hotel"></a>
    </div>
    <div class="addresses-block">
        <a data-lat="33.8042685" data-lng="-118.1561095" data-string="Downey Hotel"></a>
    </div>
    <div class="addresses-block">
        <a data-lat="40.7466196" data-lng="14.4936821" data-string="Downey Hotel"></a>
    </div>
    <div class="addresses-block">
        <a data-lat="38.9073282" data-lng="1.4296479" data-string="Downey Hotel"></a>
    </div>
    <div class="addresses-block">
        <a data-lat="53.4722454" data-lng="-2.2235922" data-string="Downey Hotel"></a>
    </div>
    <div class="addresses-block">
        <a data-lat="11.6978351" data-lng="122.6217543" data-string="Downey Hotel"></a>
    </div>
    <div class="addresses-block">
        <a data-lat="24.3865481" data-lng="54.5599079" data-string="Downey Hotel"></a>
    </div>
    <div class="addresses-block">
        <a data-lat="-33.9149861" data-lng="18.6560594" data-string="Downey Hotel"></a>
    </div>
</div>

<div class="container">
    <form action="#" class="hotel-filter">
        <div class="baner-bar cars-bar">
            <div class="row">
                <div class="col-md-12">
                    <div class="hotels-block">
                        <h4>Localización</h4>
                        <div class="input-style-1">
                            <img src="public/img/loc_icon_small_grey.png" alt="">
                            <input type="text" placeholder="Destino" required>
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
                                <option>Hotel</option>
                                <option>Restaurante</option>
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
                            <select multiple class="form-control">
                                <option>No importa</option>
                                <option>Apto para niños</option>
                                <option>Bar</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="range-wrapp">
                        <h4>Rango de Precios</h4>
                        <div class="slider-range" data-counter="$" data-position="start" data-from="0" data-to="5000" data-min="0" data-max="5000">
                            <div class="range"></div>
                            <input type="text" class="amount-start" readonly value="$0">
                            <input type="text" class="amount-end" readonly value="$1500">
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
                    <h2>Búsqueda (16)</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="hotel-item style-7">
                    <div class="radius-top">
                        <img src="img/home_10/tour_1.jpg" alt="">
                    </div>
                    <div class="title">
                        <h5>from
                            <strong class="color-red-3">$860</strong> / person</h5>
                        <h6 class="color-grey-3">one way flights</h6>
                        <h4>
                            <b>Cheap Flights to Paris</b>
                        </h4>
                        <p>Book now and
                            <span class="color-red-3">save 30%</span>
                        </p>
                        <div class="clearfix">
                            <a href="#" class="c-button b-40 bg-red-3 hv-red-3-o fl">book now</a>
                            <a href="#" class="c-button b-40 color-grey-3 hv-o fr">
                                <img src="img/flag_icon_grey.png" alt="">view more</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="hotel-item style-7">
                    <div class="radius-top">
                        <img src="img/home_10/tour_2.jpg" alt="">
                    </div>
                    <div class="title">
                        <h5>from
                            <strong class="color-red-3">$860</strong> / person</h5>
                        <h6 class="color-grey-3">one way flights</h6>
                        <h4>
                            <b>Cheap Flights to london</b>
                        </h4>
                        <p>Book now and
                            <span class="color-red-3">save 30%</span>
                        </p>
                        <div class="clearfix">
                            <a href="#" class="c-button b-40 bg-red-3 hv-red-3-o fl">book now</a>
                            <a href="#" class="c-button b-40 color-grey-3 hv-o fr">
                                <img src="img/flag_icon_grey.png" alt="">view more</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="hotel-item style-7">
                    <div class="radius-top">
                        <img src="img/home_10/tour_3.jpg" alt="">
                    </div>
                    <div class="title">
                        <h5>from
                            <strong class="color-red-3">$860</strong> / person</h5>
                        <h6 class="color-grey-3">one way flights</h6>
                        <h4>
                            <b>Flights to monaco</b>
                        </h4>
                        <p>Book now and
                            <span class="color-red-3">save 30%</span>
                        </p>
                        <div class="clearfix">
                            <a href="#" class="c-button b-40 bg-red-3 hv-red-3-o fl">book now</a>
                            <a href="#" class="c-button b-40 color-grey-3 hv-o fr">
                                <img src="img/flag_icon_grey.png" alt="">view more</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="hotel-item style-7">
                    <div class="radius-top">
                        <img src="img/home_10/tour_4.jpg" alt="">
                    </div>
                    <div class="title">
                        <h5>from
                            <strong class="color-red-3">$860</strong> / person</h5>
                        <h6 class="color-grey-3">one way flights</h6>
                        <h4>
                            <b>flights to new zealand</b>
                        </h4>
                        <p>Book now and
                            <span class="color-red-3">save 30%</span>
                        </p>
                        <div class="clearfix">
                            <a href="#" class="c-button b-40 bg-red-3 hv-red-3-o">book now</a>
                            <a href="#" class="c-button b-40 color-grey-3 hv-o fr">
                                <img src="img/flag_icon_grey.png" alt="">view more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="hotel-item style-7">
                    <div class="radius-top">
                        <img src="img/home_10/tour_5.jpg" alt="">
                    </div>
                    <div class="title">
                        <h5>from
                            <strong class="color-red-3">$860</strong> / person</h5>
                        <h6 class="color-grey-3">one way flights</h6>
                        <h4>
                            <b>Cheap Flights to Paris</b>
                        </h4>
                        <p>Book now and
                            <span class="color-red-3">save 30%</span>
                        </p>
                        <div class="clearfix">
                            <a href="#" class="c-button b-40 bg-red-3 hv-red-3-o fl">book now</a>
                            <a href="#" class="c-button b-40 color-grey-3 hv-o fr">
                                <img src="img/flag_icon_grey.png" alt="">view more</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="hotel-item style-7">
                    <div class="radius-top">
                        <img src="img/home_10/tour_6.jpg" alt="">
                    </div>
                    <div class="title">
                        <h5>from
                            <strong class="color-red-3">$860</strong> / person</h5>
                        <h6 class="color-grey-3">one way flights</h6>
                        <h4>
                            <b>Cheap Flights to london</b>
                        </h4>
                        <p>Book now and
                            <span class="color-red-3">save 30%</span>
                        </p>
                        <div class="clearfix">
                            <a href="#" class="c-button b-40 bg-red-3 hv-red-3-o fl">book now</a>
                            <a href="#" class="c-button b-40 color-grey-3 hv-o fr">
                                <img src="img/flag_icon_grey.png" alt="">view more</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="hotel-item style-7">
                    <div class="radius-top">
                        <img src="img/home_10/tour_7.jpg" alt="">
                    </div>
                    <div class="title">
                        <h5>from
                            <strong class="color-red-3">$860</strong> / person</h5>
                        <h6 class="color-grey-3">one way flights</h6>
                        <h4>
                            <b>Flights to monaco</b>
                        </h4>
                        <p>Book now and
                            <span class="color-red-3">save 30%</span>
                        </p>
                        <div class="clearfix">
                            <a href="#" class="c-button b-40 bg-red-3 hv-red-3-o fl">book now</a>
                            <a href="#" class="c-button b-40 color-grey-3 hv-o fr">
                                <img src="img/flag_icon_grey.png" alt="">view more</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="hotel-item style-7">
                    <div class="radius-top">
                        <img src="img/home_10/tour_8.jpg" alt="">
                    </div>
                    <div class="title">
                        <h5>from
                            <strong class="color-red-3">$860</strong> / person</h5>
                        <h6 class="color-grey-3">one way flights</h6>
                        <h4>
                            <b>flights to new zealand</b>
                        </h4>
                        <p>Book now and
                            <span class="color-red-3">save 30%</span>
                        </p>
                        <div class="clearfix">
                            <a href="#" class="c-button b-40 bg-red-3 hv-red-3-o">book now</a>
                            <a href="#" class="c-button b-40 color-grey-3 hv-o fr">
                                <img src="img/flag_icon_grey.png" alt="">view more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="hotel-item style-7">
                    <div class="radius-top">
                        <img src="img/home_10/tour_9.jpg" alt="">
                    </div>
                    <div class="title">
                        <h5>from
                            <strong class="color-red-3">$860</strong> / person</h5>
                        <h6 class="color-grey-3">one way flights</h6>
                        <h4>
                            <b>Cheap Flights to Paris</b>
                        </h4>
                        <p>Book now and
                            <span class="color-red-3">save 30%</span>
                        </p>
                        <div class="clearfix">
                            <a href="#" class="c-button b-40 bg-red-3 hv-red-3-o fl">book now</a>
                            <a href="#" class="c-button b-40 color-grey-3 hv-o fr">
                                <img src="img/flag_icon_grey.png" alt="">view more</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="hotel-item style-7">
                    <div class="radius-top">
                        <img src="img/home_10/tour_10.jpg" alt="">
                    </div>
                    <div class="title">
                        <h5>from
                            <strong class="color-red-3">$860</strong> / person</h5>
                        <h6 class="color-grey-3">one way flights</h6>
                        <h4>
                            <b>Cheap Flights to london</b>
                        </h4>
                        <p>Book now and
                            <span class="color-red-3">save 30%</span>
                        </p>
                        <div class="clearfix">
                            <a href="#" class="c-button b-40 bg-red-3 hv-red-3-o fl">book now</a>
                            <a href="#" class="c-button b-40 color-grey-3 hv-o fr">
                                <img src="img/flag_icon_grey.png" alt="">view more</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="hotel-item style-7">
                    <div class="radius-top">
                        <img src="img/home_10/tour_11.jpg" alt="">
                    </div>
                    <div class="title">
                        <h5>from
                            <strong class="color-red-3">$860</strong> / person</h5>
                        <h6 class="color-grey-3">one way flights</h6>
                        <h4>
                            <b>Flights to monaco</b>
                        </h4>
                        <p>Book now and
                            <span class="color-red-3">save 30%</span>
                        </p>
                        <div class="clearfix">
                            <a href="#" class="c-button b-40 bg-red-3 hv-red-3-o fl">book now</a>
                            <a href="#" class="c-button b-40 color-grey-3 hv-o fr">
                                <img src="img/flag_icon_grey.png" alt="">view more</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="hotel-item style-7">
                    <div class="radius-top">
                        <img src="img/home_10/tour_12.jpg" alt="">
                    </div>
                    <div class="title">
                        <h5>from
                            <strong class="color-red-3">$860</strong> / person</h5>
                        <h6 class="color-grey-3">one way flights</h6>
                        <h4>
                            <b>flights to new zealand</b>
                        </h4>
                        <p>Book now and
                            <span class="color-red-3">save 30%</span>
                        </p>
                        <div class="clearfix">
                            <a href="#" class="c-button b-40 bg-red-3 hv-red-3-o">book now</a>
                            <a href="#" class="c-button b-40 color-grey-3 hv-o fr">
                                <img src="img/flag_icon_grey.png" alt="">view more</a>
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
<script src="public/js/DateTimePicker.min.js"></script>
<script src="public/js/jquery.circliful.min.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;language=en&key=AIzaSyBT_bTr4NqhArVYWCSHkxM4qjruliItm_M"></script>	
<script src="public/js/map.js"></script>

