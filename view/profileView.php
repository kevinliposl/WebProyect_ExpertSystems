<?php

$session = SSession::getInstance();
if (isset($session->role)) {
    if ($session->role === "adm") {
        header('location:?');
    } else {
        include_once 'public/header_usr.php';
    }
} else {
    header('location:?');
}
?>


<script>
    (function () {
        document.getElementById("menu-profile-user").classList.add("active");
    })();
</script>

<div class="detail-wrapper">
    <div class="container">
       	<div class="row padd-90">
            <div class="col-xs-12 col-md-8">
                <form class="simple-from">
                    <div class="simple-group">
                        <h3 class="small-title">Your Personal Information</h3>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-block type-2 clearfix">
                                    <div class="form-label color-dark-2">Nombre</div>
                                    <div class="input-style-1 b-50 brd-0 type-2 color-3">
                                        <input type="text" placeholder="Enter your first name">
                                    </div>
                                </div>							
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-block type-2 clearfix">
                                    <div class="form-label color-dark-2">Apellidos</div>
                                    <div class="input-style-1 b-50 brd-0 type-2 color-3">
                                        <input type="text" placeholder="Enter your last name">
                                    </div>
                                </div>							
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-block type-2 clearfix">
                                    <div class="form-label color-dark-2">Correo</div>
                                    <div class="input-style-1 b-50 brd-0 type-2 color-3">
                                        <input type="text" placeholder="Enter your e-mail adress">
                                    </div>
                                </div>							
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-block type-2 clearfix">
                                    <div class="form-label color-dark-2">Verificar correo</div>
                                    <div class="input-style-1 b-50 brd-0 type-2 color-3">
                                        <input type="text" placeholder="Enter your e-mail adress for verify">
                                    </div>
                                </div>							
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-block type-2 clearfix">
                                    <div class="form-label color-dark-2">¿Usted se considera?</div>
                                    <div class="drop-wrap drop-wrap-s-4 color-5">
                                        <select class="form-control">
                                            <option>Aventurero</option>
                                            <option>Conservador</option>
                                            <option>Investigador</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="c-button bg-dr-blue-2 hv-dr-blue-2-o" value="Actualizar datos">
                </form>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="right-sidebar">

                    <div class="popular-tours bg-grey-2">
                        <h4 class="color-dark-2">Historial</h4>
                        <div class="hotel-small style-2 clearfix">
                            <a class="hotel-img black-hover" href="#">
                                <img class="img-responsive radius-0" src="public/img/home_9/cruise_1.jpg" alt="">
                                <div class="tour-layer delay-1"></div>        						
                            </a>
                            <div class="hotel-desc">
                                <h5><span class="color-dark-2"><strong>$273</strong>/ person</span></h5>
                                <h4>HAWAIAN CRUISES</h4>
                                <div class="hotel-loc tt"><strong>19.07 - 26.07 / 7</strong> nights</div>
                            </div>
                        </div>
                        <div class="hotel-small style-2 clearfix">
                            <a class="hotel-img black-hover" href="#">
                                <img class="img-responsive radius-0" src="public/img/home_9/cruise_2.jpg" alt="">
                                <div class="tour-layer delay-1"></div>        						
                            </a>
                            <div class="hotel-desc">
                                <h5><span class="color-dark-2"><strong>$273</strong>/ person</span></h5>
                                <h4>TAHITI CRUISES</h4>
                                <div class="hotel-loc tt"><strong>19.07 - 26.07 / 7</strong> nights</div>
                            </div>
                        </div>
                        <div class="hotel-small style-2 clearfix">
                            <a class="hotel-img black-hover" href="#">
                                <img class="img-responsive radius-0" src="public/img/home_9/cruise_3.jpg" alt="">
                                <div class="tour-layer delay-1"></div>        						
                            </a>
                            <div class="hotel-desc">
                                <h5><span class="color-dark-2"><strong>$273</strong>/ person</span></h5>
                                <h4>ASIA CRUISES</h4>
                                <div class="hotel-loc tt"><strong>19.07 - 26.07 / 7</strong> nights</div>
                            </div>
                        </div>											
                    </div>

                    <div class="sidebar-text-label bg-dr-blue-2 color-white">Ver todo el historial</div>
                </div>       			
            </div>
       	</div>
    </div>
</div>

<?php

include_once 'public/footer.php';
