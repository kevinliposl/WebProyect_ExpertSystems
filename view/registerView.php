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
                        <div class="f-login-title color-dr-blue-2">¡Registrarse ahora!</div>
                        <div class="f-login-desc color-grey">Por favor ingrese los datos de su cuenta</div>
                    </div>
                    <form class="f-login-form" onsubmit="return send();">
                        <div class="input-style-2 form-group">
                            <input id="form-mail" class="form-control" type="text" placeholder="Correo Electronico" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                        </div>
                        <div class="input-style-2 form-group">
                            <input id="form-name" class="form-control" type="text" placeholder="Nombre" minlength="2" required>
                        </div>
                        <div class="input-style-2 form-group">
                            <input id="form-lastname" class="form-control" type="text" placeholder="Apellido" minlength="2" required>
                        </div>
                        <div class="input-style-2 form-group">
                            <input id="form-password" class="form-control" type="text" placeholder="Contraseña" minlength="2" required>
                        </div>
                        <div class="input-style-2 form-group"> 
                            <select id="form-style" class="form-control" required>
                                <option disabled selected>Como te consideras?</option>
                                <option value="investigador">Investigador</option>
                                <option value="conservador">Conservador</option>
                                <option value="aventurero">Aventurero</option>
                            </select>
                        </div>				
                        <input type="submit" class="login-btn sidebar-text-label c-button full b-60 bg-dr-blue-2 hv-dr-blue-2-o" value="Registrarse">
                    </form>
                </div>				
            </div>
        </div>
    </div>
</div>  

<script>

    (function () {
        $("#menu-sign-up").addClass("active");
    })();

    function send() {
        var args = {
            "mail": $("#form-mail").val(),
            "name": $("#form-name").val(),
            "lastname": $("#form-lastname").val(),
            "password": $("#form-password").val(),
            "style": $("#form-style").val()
        };

        $('#form-message').html("Espere...");

        $.post('?controller=User&action=signOn', args, function (data) {
            if (parseInt(data.result) === 1) {
                $('#form-message').html("Redireccionando...");
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
