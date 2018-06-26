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
<br>
<br>
<div class="detail-wrapper">
    <div class="container">
       	<div class="row padd-90">
            <div class="col-xs-12 col-md-8">
                <form class="simple-from">
                    <div class="simple-group">
                        <h3 class="small-title">Información personal</h3>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-block type-2 clearfix">
                                    <div class="form-label color-dark-2">Nombre</div>
                                    <div class="input-style-2 form-group">
                                        <input class="form-control" type="text" value="<?php echo $vars['name']?>" placeholder="Ingrese su nombre">
                                    </div>
                                </div>							
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-block type-2 clearfix">
                                    <div class="form-label color-dark-2">Apellidos</div>
                                    <div class="input-style-2 form-group">
                                        <input class="form-control" type="text" value="<?php echo $vars['lastname']?>" placeholder="Ingresa su apellido">
                                    </div>
                                </div>							
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-block type-2 clearfix">
                                    <div class="form-label color-dark-2">Correo</div>
                                    <div class="input-style-2 form-group">
                                        <input class="form-control" type="text" value="<?php echo $vars['mail']?>" placeholder="Ingrese su direcci&oacute;n de correo electr&oacute;nico">
                                    </div>
                                </div>							
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-block type-2 clearfix">
                                    <div class="form-label color-dark-2">Verificar correo</div>
                                    <div class="input-style-2 form-group">
                                        <input class="form-control" type="text" placeholder="Repita su direcci&oacute;n de correo para verificar">
                                    </div>
                                </div>							
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-block type-2 clearfix">
                                    <div class="form-label color-dark-2">¿Usted se considera?</div>
                                    <div class="input-style-2 form-group">
                                        <select class="form-control">
                                            <option <?php if($vars['style']=="Conservador") {echo 'selected';}?> value="1">Conservador</option>
                                            <option <?php if($vars['style']=="Investigador") {echo 'selected';}?> value="2">Investigador</option>
                                            <option <?php if($vars['style']=="Aventurero") {echo 'selected';}?> value="3">Aventurero</option>
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
<!--                        <div class="hotel-small style-2 clearfix">
                            <a class="hotel-img black-hover" href="#">
                                <img class="img-responsive radius-0" src="public/img/home_10/tour_1.jpg" alt="">
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
                                <img class="img-responsive radius-0" src="public/img/home_10/tour_2.jpg" alt="">
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
                                <img class="img-responsive radius-0" src="public/img/home_10/tour_2.jpg" alt="">
                                <div class="tour-layer delay-1"></div>        						
                            </a>
                            <div class="hotel-desc">
                                <h5><span class="color-dark-2"><strong>$273</strong>/ person</span></h5>
                                <h4>ASIA CRUISES</h4>
                                <div class="hotel-loc tt"><strong>19.07 - 26.07 / 7</strong> nights</div>
                            </div>
                        </div>											-->
                    </div>
                    <div class="sidebar-text-label bg-blue-2 color-white">Ver todo el historial</div>
                </div>       			
            </div>
       	</div>
    </div>
</div>

<?php

include_once 'public/footer.php';
