<?php
$session = SSession::getInstance();
if (isset($session->role)) {
    if ($session->role === "adm") {
        include_once 'public/header_adm.php';
    } else {
        header('location:?');
    }
} else {
    header('location:?');
}
?>

<script>
    (function () {
        $("#menu-destination").addClass("active");
    })();
</script>

<link href="public/css/select.css" rel="stylesheet" type="text/css" />
<script src="public/js/bootstrap-select.min.js"></script>

<div class="container">
    <div class="login-fullpage">                                                                            
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                <div class="f-login-content">
                    <div class="f-login-header">
                        <div class="f-login-title color-dr-blue-2">¡Eliminar Destino!</div>
                        <div class="f-login-desc color-grey">Por favor seleccione un destino!</div>
                    </div>
                    <form class="f-login-form" onsubmit="send(); return false">
                        <div class="input-style-1 b-50 type-2 color-5">
                            <select id="form-destiny" class="form-control selectpicker">
                                <option selected disabled>Destino</option>
                                <?php foreach ($vars as $value) { ?>
                                    <option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>";
                                <?php } ?>
                            </select>
                        </div>
                        <input type="submit" class="login-btn sidebar-text-label c-button full b-60 bg-dr-blue-2 hv-dr-blue-2-o" value="Eliminar"/>
                    </form>
                    <div id="form-message"></div>
                </div>				
            </div>
        </div>
    </div>
</div>  

</br>
</br>
</br>
<script>

    $(".selectpicker").selectpicker({
        noneSelectedText: 'Facilidades',
        size: 5,
        dropupAuto: false
    });

    function send() {
        var args = {
            'id': $('#form-destiny').val()
        };

        $('#form-message').html("Espere...");

        $.post('?controller=Destiny&action=delete', args, function (data) {
            if (parseInt(data.result) === 1) {
                $('#form-message').html("Eliminación exitosa...");
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
