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
        document.getElementById("menu-map").classList.add("active");
    })();
</script>

<!-- INNER-BANNER -->
<div class="inner-banner style-6">
    <img class="center-image" src="public/img/detail/bg_4.jpg" alt="">
    <div class="vertical-align">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-8 col-md-offset-2">
                    <h2 class="color-white">Mapa del Sitio</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="wrap-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="menu-block">
                    <h4>Páginas</h4>
                    <div class="col-md-4">
                        <ul class="dropmenu">
                            <li class="list-title">Home</li>
                            <li><a href="?">Home</a></li>
                            <li><a href="?action=aboutUs">Sobre Nosotros</a></li>
                        </ul>	
                    </div>
                    <div class="col-md-4">
                        <ul class="dropmenu">
                            <li class="list-title">B&uacute;squeda</li>
                            <li><a href="?controller=Destiny&action=basicSearchView">B&uacute;squeda Basica</a></li>
                            <?php if (SSession::getInstance()->__isset("role")) { ?>
                                <li><a href="">B&uacute;squeda Avanzada</a></li>  
                                <?php
                            }
                            ?>
                        </ul>	
                    </div>
                    <div class="col-md-4">
                        <ul class="dropmenu">
                            <li class="list-title">Usuario</li>
                            <?php if (SSession::getInstance()->__isset("role")) { ?>
                                <li><a href="?action=profileUser">Perfil</a></li>
                                <li><a href="?controller=User&action=signOut">Cerrar Sesi&oacute;n</a></li> 
                                <?php
                            } else {
                                ?> 
                                <li><a href="?action=login">Iniciar Sesi&oacute;n</a></li>
                                <li><a href="?action=register">Reg&iacute;strarse</a></li>
                                <li><a href="?controller=User&action=rememberPassword">Recordar Contraseña</a></li>
                                <?php
                            }
                            ?>
                        </ul>	
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'public/footer.php';
