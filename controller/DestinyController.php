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

    function basicSearchViewData() {
        $model = new DestinyModel();
        $naiveBayes = new NaiveBayes();

        $vars = $model->selectAllBasicTraining();

        $labels = array('location_id' => 7,'type_id' => 3,'stars' => 5, 'attraction_id' => 7);

        $possibleValues  = array('location_id' => array(1,2,3,4,5,6,7),
                                'type_id' => array(1,2,3),
                                'stars' => array(1,2,3,4,5),
                                'attraction_id' => array(1,2,3,4,5,6,7));

        /*
        $userPetition = json_decode($_POST['userPetition']);
        $userValues  = array('location_id' => intval($userPetition[0]),'attraction_id' => intval($userPetition[1]),'type_id' => $userPetition[2],'stars' => $userPetition[3]);
        */
        
        $naiveBayes->loadVariables($model->getAllTrainingData('basicsearch'), $labels, $possibleValues);
        
        $naiveBayes->printNaiveBayesVariables();
        /*
        $predict = $naiveBayes->predict($userValues);
        */
    
    }   
    
    function trainingBasicSearch(){
        $model = new DestinyModel;
        $naiveBayes = new NaiveBayes();

        $vars = $model->selectAllBasicTraining();

        $labels = array('location_id' => 7,'type_id' => 3,'stars' => 5, 'attraction_id' => 7,);

        $possibleValues  = array('location_id' => array(1,2,3,4,5,6,7),
                                'type_id' => array(1,2,3),
                                'stars' => array(1,2,3,4,5),
                                'attraction_id' => array(1,2,3,4,5,6,7));

        $naiveBayes->training($vars, $labels, $possibleValues);

        $naiveBayes->saveTraining('basicsearch');
    }
}
