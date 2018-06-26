<?php

$session = SSession::getInstance();
if (isset($session->role)) {
    header('location:?');
} else {
    include_once 'public/header.php';
}
?>

<script>
    (function () {
        $("menu-sign-in").addClass("active");
    })();
</script>

<div class="container">
    <div class="login-fullpage">                                                                            
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                <div class="f-login-content">
                    <div class="f-login-header">
                        <div class="f-login-title color-dr-blue-2">¡Recordar Contraseña!</div>
                        <div class="f-login-desc color-grey">Por favor ingrese los datos de su cuenta!</div>
                    </div>
                    <form class="f-login-form">
                        <div class="input-style-2 form-group">
                            <input type="text" class="form-control" placeholder="Correo Electronico" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                        </div>
                        <input type="submit" class="login-btn sidebar-text-label c-button full bg-dr-blue-2" value="Recordar al correo electronico">
                    </form>
                </div>				
            </div>
        </div>
    </div>
</div>  

<br>
<br>
<br>
<?php

include_once 'public/footer.php';
