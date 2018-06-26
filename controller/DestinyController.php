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
        require_once 'libs/NaiveBayes.php';
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

    function training(){
        $model = new DestinyModel;
        $naiveBayes = new NaiveBayes();

        $vars = $model->selectAllBasicTraining();

        $labels = array('location_id' => 7,'attraction_id' => 7,'type_id' => 3,'stars' => 5,'style_id' => 3);

        $possibleValues  = array('location_id' => array(1,2,3,4,5,6,7),
                                'attraction_id' => array(1,2,3,4,5,6,7),
                                'type_id' => array(1,2,3),
                                'stars' => array(1,2,3,4,5),
                                'style_id' => array(1,2,3));

        $naiveBayes->training($vars, $labels, $possibleValues);

        $naiveBayes->saveTraining('basicsearch');

        $naiveBayes->printNaiveBayesVariables();

    }

}
