<?php

include_once 'public/header.php';
?>

<script>
    (function () {
        var element = document.getElementById("menu-register");
        element.classList.add("active");
    })();
</script>

<div class="container">
    <div class="login-fullpage">                                                                            
        <div class="row">
            <div class="login-logo"><img class="center-image" src="img/special/login.jpg" alt=""></div>
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                <div class="f-login-content">
                    <div class="f-login-header">
                        <div class="f-login-title color-dr-blue-2">¡Registrarse ahora!</div>
                        <div class="f-login-desc color-grey">Por favor ingrese los datos de su cuenta</div>
                    </div>
                    <form class="f-login-form">
                        <div class="input-style-1 b-50 type-2 color-2">
                            <input type="text" placeholder="Correo Electronico" required>
                        </div>
                        <div class="input-style-1 b-50 type-2 color-2">
                            <input type="text" placeholder="Nombre" required>
                        </div>
                        <div class="input-style-1 b-50 type-2 color-2">
                            <input type="text" placeholder="Apellido" required>
                        </div>
                        <div class="input-style-1 b-50 type-2 color-2">
                            <input type="text" placeholder="Contraseña" required>
                        </div>
                        <div class="input-style-1 drop-wrap drop-wrap-s-4 color-2">
                            <div class="drop">
                                <b>¿Usted se considera?</b>
                                <a href="#" class="drop-list"><i class="fa fa-angle-down"></i></a>
                                <span>
                                    <a href="#">Investigador</a>
                                    <a href="#">Conservador</a>
                                    <a href="#">Aventurero</a>
                                </span>
                            </div>
                        </div>				
                        <input type="submit" class="login-btn c-button full b-60 bg-dr-blue-2 hv-dr-blue-2-o" value="Registrarse">
                    </form>
                </div>				
            </div>
        </div>
    </div>
</div>  


<?php

include_once 'public/footer.php';
