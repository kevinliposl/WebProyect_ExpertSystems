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

<div class="container">
    <div class="login-fullpage">                                                                            
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 col-md-7 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
                <div class="f-login-header">
                    <div class="f-login-title color-dr-blue-2">¡Registrar Destino!</div>
                    <div class="f-login-desc color-grey">Por favor ingrese los datos solicitados!</div>
                </div>
                <form class="f-login-form" onsubmit="return send(); return false;">
                    <div class="input-style-2 form-group">
                        <input class="form-control" type="text" placeholder="Nombre" required>
                    </div>
                    <div  class="input-style-2 form-group"> 
                        <select class="form-control">
                            <option disabled selected>Atracci&oacute;n</option>
                            <option>Parques Nacionales</option>
                            <option>Ruinas y Lugares Históricos</option>
                            <option>Galerías y Museos</option>
                            <option>Jardines botánicos y zoológicos</option>
                            <option>Miradores</option>
                            <option>Hotel</option>
                            <option>Restaurante</option>
                        </select>
                    </div>
                    <div class="input-style-2 form-group">
                        <select class="form-control">
                            <option disabled selected>Tipo</option>
                            <option>Rural</option>
                            <option>Urbana</option>
                            <option>Costera</option>
                            <option>De Montaña</option>
                        </select>
                    </div>
                    <div class="input-style-2 form-group">
                        <select class="form-control">
                            <option disabled selected>Facilidades</option>
                            <?php   ?>
                            <option>Televisión por cable</option>
                            <option>Teléfono</option>
                            <option>Internet</option>
                            <option>Bar</option>
                            <option>Restaurante</option>
                            <option>Transporte</option>
                            <option>Hospedaje</option>
                            <option>Espacio para niños</option>
                            <option>Asistencia</option>                        
                        </select>
                    </div>
                    <div class="input-style-2 form-group">
                        <input class="form-control" type="text" placeholder="Localizaci&oacute;n" required/>
                    </div>
                    <div class="input-style-2 form-group">
                        <input class="form-control" type="number" placeholder="Precio" required/>
                    </div>
                    <div class="input-style-2 form-group">
                        <input class="form-control" type="number" placeholder="Latitud" required/>
                    </div>
                    <div class="input-style-2 form-group">
                        <input class="form-control" type="number" placeholder="Longitud" required/>
                    </div>
                    <div class="input-style-2 form-group">
                        <input class="form-control" type="text" placeholder="Enlace Video" required/>
                    </div>
                    <div class="input-style-2 form-group">
                        <input class="form-control" type="text" placeholder="Enlace Imagen" required/>
                    </div>
                    <div class="input-style-2 form-group">
                        <input type="submit" class="form-control login-btn c-button full b-50 bg-dr-blue-2 hv-dr-blue-2-o" value="Registrar"/>
                    </div>
                </form>
            </div>				
        </div>
    </div>
</div>  

<script>

    function send() {


    }

</script>

<?php

include_once 'public/footer.php';
