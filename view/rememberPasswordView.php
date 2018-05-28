<?php
include_once 'public/header.php';
?>

<script>
    (function () {
        var element = document.getElementById("menu-sign-in");
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
                        <div class="f-login-title color-dr-blue-2">¡Recordar Contraseña!</div>
                        <div class="f-login-desc color-grey">Por favor ingrese los datos de su cuenta!</div>
                    </div>
                    <form class="f-login-form">
                        <div class="input-style-1 b-50 type-2 color-5">
                            <input type="text" placeholder="Correo Electronico" required>
                        </div>
                        <input type="submit" class="login-btn c-button full b-60 bg-dr-blue-2 hv-dr-blue-2-o" value="Recordar al correo electronico">
                    </form>
                </div>				
            </div>
        </div>
    </div>
</div>  


<?php
include_once 'public/footer.php';
