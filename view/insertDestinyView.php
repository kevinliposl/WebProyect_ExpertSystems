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
            <div class="col-lg-6 col-lg-offset-3 col-md-7 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
                <div class="f-login-header">
                    <div class="f-login-title color-dr-blue-2">¡Registrar Destino!</div>
                    <div class="f-login-desc color-grey">Por favor ingrese los datos solicitados!</div>
                </div>
                <form class="f-login-form" onsubmit="send(); return false">
                    <div class="input-style-2 form-group">
                        <input id="form-name" class="form-control" type="text" placeholder="Nombre" required>
                    </div>
                    <div class="input-style-2 form-group">
                        <input id="form-description" class="form-control" type="text" placeholder="Descripci&oacute;n" required>
                    </div>
                    <div  class="input-style-2 form-group"> 
                        <select id="form-attraction" class="form-control selectpicker">
                            <option disabled selected>Atracci&oacute;n</option>
                            <?php foreach ($vars['attraction'] as $value) { ?>
                                <option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>";
                            <?php }
                            ?>                   
                        </select>
                    </div>
                    <div class="input-style-2 form-group">
                        <select id="form-type" class="form-control selectpicker">
                            <option disabled selected>Tipo</option>
                            <?php foreach ($vars['type'] as $value) { ?>
                                <option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>";
                            <?php }
                            ?>                   
                        </select>
                    </div>
                    <div class="input-style-2 form-group">
                        <select id="form-facilities" multiple class="form-control selectpicker">
                            <?php foreach ($vars['facilities'] as $value) { ?>
                                <option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>";
                            <?php }
                            ?>                   
                        </select>
                    </div>
                    <div class="input-style-2 form-group">
                        <select id="form-location" class="form-control selectpicker">
                            <option disabled selected>Localizaci&oacute;n</option>
                            <?php foreach ($vars['location'] as $value) { ?>
                                <option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>";
                            <?php }
                            ?>                   
                        </select>
                    </div>
                    <div class="input-style-2 form-group">
                        <input id="form-price" class="form-control" type="number" min="0" max="1000" placeholder="Precio" required/>
                    </div>
                    <div class="input-style-2 form-group">
                        <input id="form-latitude" class="form-control" type="text" placeholder="Latitud" required/>
                    </div>
                    <div class="input-style-2 form-group">
                        <input id="form-logitude" class="form-control" type="text" placeholder="Longitud" required/>
                    </div>
                    <div class="input-style-2 form-group">
                        <input id="form-video" class="form-control" type="text" placeholder="Enlace Video" required/>
                    </div>
                    <div class="input-style-2 form-group">
                        <input id="form-image" class="form-control" type="text" placeholder="Enlace Imagen" required/>
                    </div>
                    <div class="input-style-2 form-group">
                        <input type="submit" class="form-control sidebar-text-label login-btn c-button full b-50 bg-dr-blue-2 hv-dr-blue-2-o" value="Registrar"/>
                    </div>
                </form>
                <div id="form-message"></div>
            </div>				
        </div>
    </div>
</div>  

<script>

    $(".selectpicker").selectpicker({
        noneSelectedText: 'Facilidades'
    });

    function send() {
        var args = {
            'image': $('#form-image').val(),
            'video': $('#form-video').val(),
            'logitude': $('#form-logitude').val(),
            'latitude': $('#form-latitude').val(),
            'price': $('#form-price').val(),
            'location': $('#form-location').val(),
            'facilities': $('#form-facilities').val(),
            'type': $('#form-type').val(),
            'attraction': $('#form-attraction').val(),
            'description': $('#form-description').val(),
            'name': $('#form-name').val()
        };

        alert(JSON.stringify(args));
        $('#form-message').html("Espere...");

        $.post('?controller=Destiny&action=insert', args, function (data) {
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
