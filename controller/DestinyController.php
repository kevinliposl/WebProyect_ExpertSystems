<?php

/**
 * @version 1.0
 * @copyright (c) 2018, Kevin Sandoval Loaiza b46549, Pablo Barrientos Brenes b40920
 * @access public
 * @category controller
 * Class UserController     
 */
class DestinyController {

    /**
     * Constructor de clase
     */
    function __construct() {
        $this->view = new View();
        require_once 'model/DestinyModel.php';
    }

    /**
     * Funcion para registrar 
     */
    function basicSearchView() {
        $model = new DestinyModel();
        $destiny = $model->selectAll();
        $attraction = $model->selectAllAttraction();
        $types = $model->selectAllTypes();
        $this->view->show("basicSearchView.php", array("destiny" => $destiny, "attraction" => $attraction, "type" => $types));
    }

}
