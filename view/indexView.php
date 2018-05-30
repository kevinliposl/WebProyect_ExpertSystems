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
        var element = document.getElementById("menu-index");
        element.classList.add("active");
    })();
</script>

<div class="top-baner swiper-animate arrows">
    <div class="swiper-container main-slider-3 h-143" data-autoplay="0" data-loop="0" data-speed="500" data-center="" data-slides-per-view="1">
        <div class="swiper-wrapper">
            <div class="swiper-slide active" data-val="0">
                <div class="clip">
                    <div class="bg bg-bg-chrome act" style="background-image:url(public/img/init.jpg)"></div>
                </div>
                <div class="vertical-align">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                                <div class="main-title">
                                    <h1 class="color-white delay-1">¿Buscas un destino?</h1>
                                </div>
                            </div>
                            <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-12 col-xs-12">
                                <a class="main-title c-button bg-dr-blue hv-transparent" <?php
                                if (SSession::getInstance()->__isset('role')) {
                                    if ($session->role !== "adm") {
                                        echo "href='?action=advancedSearch'";
                                    } else {
                                        echo "style='display:none;'";
                                    }
                                } else {
                                    echo "href='?action=basicSearch'";
                                }
                                ?>>
                                    <img src="public/img/search_icon.png" alt="">
                                    <span>¡Recomendar ahora!</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pagination pagination-hidden poin-style-1"></div>
        </div>
    </div>
</div>
<div class="main-wraper padd-90" <?php
if (SSession::getInstance()->__isset('role')) {
    if ($session->role === "adm") {
        echo "style='display:none;'";
    }
}
?>>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="second-title">
                    <h2>Destinos Populares</h2>
                    <p class="color-grey">Lo que nuestros usuarios más han buscado.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="arrows">
                <div class="swiper-container hotel-slider" data-autoplay="5000" data-loop="1" data-speed="1000" data-center="0" data-slides-per-view="responsive"
                     data-mob-slides="1" data-xs-slides="2" data-sm-slides="2" data-md-slides="3" data-lg-slides="4" data-add-slides="4">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="hotel-item">
                                <div class="radius-top">
                                    <img src="public/img/home_3/pop_hotel_1.jpg" alt="">
                                    <div class="price price-s-1">Desde &#162 1000</div>
                                </div>
                                <div class="title clearfix">
                                    <h4>
                                        <b>Avenida 6</b>
                                    </h4>
                                    <div class="rate-wrap">
                                        <div class="rate">
                                            <span class="fa fa-star color-yellow"></span>
                                            <span class="fa fa-star color-yellow"></span>
                                            <span class="fa fa-star color-yellow"></span>
                                            <span class="fa fa-star color-yellow"></span>
                                            <span class="fa fa-star color-yellow"></span>
                                        </div>
                                        <i>Visto 485</i>
                                    </div>
                                    <span class="f-14 color-dark-2">Turrialba, Cartago</span>
                                    <p class="f-14">Expertos en bebidas y postres.</p>
                                    <a href="?action=destinationDetail" class="c-button bg-dr-blue hv-dr-blue-o b-50 fl">Ver más</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="hotel-item">
                                <div class="radius-top">
                                    <img src="public/img/home_3/pop_hotel_1.jpg" alt="">
                                    <div class="price price-s-1">Desde &#162 1000</div>
                                </div>
                                <div class="title clearfix">
                                    <h4>
                                        <b>Avenida 6</b>
                                    </h4>
                                    <div class="rate-wrap">
                                        <div class="rate">
                                            <span class="fa fa-star color-yellow"></span>
                                            <span class="fa fa-star color-yellow"></span>
                                            <span class="fa fa-star color-yellow"></span>
                                            <span class="fa fa-star color-yellow"></span>
                                            <span class="fa fa-star color-yellow"></span>
                                        </div>
                                        <i>Visto 485</i>
                                    </div>
                                    <span class="f-14 color-dark-2">Turrialba, Cartago</span>
                                    <p class="f-14">Expertos en bebidas y postres.</p>
                                    <a href="?action=destinationDetail" class="c-button bg-dr-blue hv-dr-blue-o b-50 fl">Ver más</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="hotel-item">
                                <div class="radius-top">
                                    <img src="public/img/home_3/pop_hotel_1.jpg" alt="">
                                    <div class="price price-s-1">Desde &#162 1000</div>
                                </div>
                                <div class="title clearfix">
                                    <h4>
                                        <b>Avenida 6</b>
                                    </h4>
                                    <div class="rate-wrap">
                                        <div class="rate">
                                            <span class="fa fa-star color-yellow"></span>
                                            <span class="fa fa-star color-yellow"></span>
                                            <span class="fa fa-star color-yellow"></span>
                                            <span class="fa fa-star color-yellow"></span>
                                            <span class="fa fa-star color-yellow"></span>
                                        </div>
                                        <i>Visto 485</i>
                                    </div>
                                    <span class="f-14 color-dark-2">Turrialba, Cartago</span>
                                    <p class="f-14">Expertos en bebidas y postres.</p>
                                    <a href="?action=destinationDetail" class="c-button bg-dr-blue hv-dr-blue-o b-50 fl">Ver más</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="hotel-item">
                                <div class="radius-top">
                                    <img src="public/img/home_3/pop_hotel_1.jpg" alt="">
                                    <div class="price price-s-1">Desde &#162 1000</div>
                                </div>
                                <div class="title clearfix">
                                    <h4>
                                        <b>Avenida 6</b>
                                    </h4>
                                    <div class="rate-wrap">
                                        <div class="rate">
                                            <span class="fa fa-star color-yellow"></span>
                                            <span class="fa fa-star color-yellow"></span>
                                            <span class="fa fa-star color-yellow"></span>
                                            <span class="fa fa-star color-yellow"></span>
                                            <span class="fa fa-star color-yellow"></span>
                                        </div>
                                        <i>Visto 485</i>
                                    </div>
                                    <span class="f-14 color-dark-2">Turrialba, Cartago</span>
                                    <p class="f-14">Expertos en bebidas y postres.</p>
                                    <a href="?action=destinationDetail" class="c-button bg-dr-blue hv-dr-blue-o b-50 fl">Ver más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pagination"></div>
                    <div class="swiper-arrow-left arrows-travel">
                        <span class="fa fa-angle-left"></span>
                    </div>
                    <div class="swiper-arrow-right arrows-travel">
                        <span class="fa fa-angle-right"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'public/footer.php';
