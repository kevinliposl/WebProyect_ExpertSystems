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
        $this->view->show("siteMapView.php");
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

}
