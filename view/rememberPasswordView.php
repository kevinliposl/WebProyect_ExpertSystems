<?php
$session = SSession::getInstance();
if (isset($session->role)) {
    header('location:?');
} else {
    include_once 'public/header.php';
}
?>

<div class="container">
    <div class="login-fullpage">                                                                            
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                <div class="f-login-content">
                    <div class="f-login-header">
                        <div class="f-login-title color-dr-blue-2">¡Recordar Contraseña!</div>
                        <div class="f-login-desc color-grey">Por favor ingrese los datos de su cuenta!</div>
                    </div>
                    <form class="f-login-form" onsubmit="send_info(); return false">
                        <div class="input-style-2 form-group">
                            <input type="text" class="form-control" id="form-mail" placeholder="Correo Electronico" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                        </div>
                        <input type="submit" class="login-btn sidebar-text-label c-button full bg-dr-blue-2" value="Recordar al correo electronico">
                    </form>
                    <div id="form-message"></div>
                </div>				
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
</div>  

<script>

    (function () {
        $("menu-sign-in").addClass("active");
    })();

    function send_info() {
        var args = {
            'mail': $('#form-mail').val().trim()
        };

        $('#form-message').html("Espere...");

        $.post('?controller=User&action=rememberPassword', args, function (data) {
            if (parseInt(data.result) === 1) {
                $('#form-message').html("Se realizó el envió a su correo electrónico...");
                setTimeout("location.href = '?';", 1000);
            } else {
                $('#form-message').html("Datos erróneos. Por favor, inténtelo otra vez.");
                setTimeout("$('#form-message').html('');", 5000);
            }
        }, 'JSON').fail(function () {
            alert("La solicitud a fallado!!!");
        });
    }

</script>
<?php
include_once 'public/footer.php';
