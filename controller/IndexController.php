<?php

/**
 * @version 1.0
 * @copyright (c) 2018, Kevin Sandoval Loaiza b46549, Pablo Barrientos Brenes b40920
 * @access public
 * @category controller
 * Class IndexController     
 */
class IndexController {

    /**
     * Contructor de clase
     */
    function __construct() {
        $this->view = new View();
    }

    /**
     * Redireccion al mapa
     */
    function map() {
        $this->view->show("mapSiteView.php");
    }

    /**
     * Accion por defecto
     */
    function defaultAction() {
        $this->view->show("indexView.php");
    }

    /**
     * Redirecciona al login
     */
    function login() {
        $this->view->show("loginView.php");
    }

    /**
     * Redireccion a la pagina de no encontrado
     */
    function notFound() {
        $this->view->show("404View.php");
    }

    /**
     * Redireccion al registro
     */
    function register() {
        $this->view->show("registerView.php");
    }

    /**
     * Redirecciona al recordar contraseña
     */
    function rememberPassword() {
        $this->view->show("rememberPasswordView.php");
    }

    /**
     * Redirecciona a detalle de la atraccion
     */
    function destinationDetail() {
        $this->view->show("destinationDetailView.php");
    }

    /**
     * Redirecciona al sobre nosotros
     */
    function aboutUs() {
        $this->view->show("aboutUsView.php");
    }

    /**
     * Redirecciona a la busqueda avanzada
     */
    function advancedSearch() {
        $this->view->show("advancedSearchView.php");
    }

    /**
     * Redirecciona al perfil
     */
    function profileUser() {
        $this->view->show("profileView.php");
    }

    /**
     * Redirecciona a insertar destino
     */
    function insertDestiny() {
        $this->view->show("insertDestinyView.php");
    }

    /**
     * Redirecciona a eliminar destino
     */
    function deleteDestiny() {
        $this->view->show("deleteDestinyView.php");
    }

    /**
     * Redirecciona a actualizar destino
     */
    function updateDestiny() {
        $this->view->show("updateDestinyView.php");
    }

}
