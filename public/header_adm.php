<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <link href="public/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="public/css/jquery-ui.structure.min.css" rel="stylesheet" type="text/css" />
        <link href="public/css/jquery-ui.min.css" rel="stylesheet" type="text/css" />
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"/>
        <link href="public/css/style.css" rel="stylesheet" type="text/css" />
        <script src="public/js/jquery.min.js"></script>
        <title>PK Tourism</title>
    </head>
    <body id="body" data-color="theme-1">
        <div class="loading dr-blue">
            <div class="loading-center">
                <div class="loading-center-absolute">
                    <div class="object object_four"></div>
                    <div class="object object_three"></div>
                    <div class="object object_two"></div>
                    <div class="object object_one"></div>
                </div>
            </div>
        </div>
        <header class="color-1 hovered menu-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="nav">
                            <a href="?" class="logo">
                                <img style="margin-top: 5px;" src="public/img/logo.png">
                            </a>
                            <div class="nav-menu-icon">
                                <a href="#">
                                    <i></i>
                                </a>
                            </div>
                            <nav class="menu">
                                <ul>
                                    <li id="menu-destination" class="type-1"><a href="#">Destino</a>
                                        <ul class="dropmenu">
                                            <li><a href="?controller=Destiny&action=insert">Registrar</a></li>
                                            <li><a href="?controller=Destiny&action=update">Actualizar</a></li>
                                            <li><a href="?controller=Destiny&action=delete">Eliminar</a></li>
                                        </ul>
                                    </li>
                                    <li id="menu-sign-out" class="type-1">
                                        <a href="?controller=User&action=signOut">Cerrar Sesión
                                            <span class="fa fa-angle-down"></span>
                                        </a>
                                    </li>
                                </ul> 
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>