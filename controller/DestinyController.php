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

        $labels = array('location_id' => 7, 'type_id' => 3, 'stars' => 5, 'attraction_id' => 7);

        $possibleValues = array('location_id' => array(1, 2, 3, 4, 5, 6, 7),
            'type_id' => array(1, 2, 3),
            'stars' => array(1, 2, 3, 4, 5),
            'attraction_id' => array(1, 2, 3, 4, 5, 6, 7));

        /*
          $userPetition = json_decode($_POST['userPetition']);
         */
        $userValues = array('location_id' => intval('4'), 'type_id' => intval('1'), 'stars' => intval('1'));
        $naiveBayes->loadVariables($model->getAllTrainingData('basicsearch'), $labels, $possibleValues);
        $predict = $naiveBayes->predict($userValues);

        $this->distanceEuclideanBasicSearch($predict, $userValues);
    }

    function distanceEuclideanBasicSearch($predict, $userValues) {
        $model = new DestinyModel;
        $vars = $model->selectGetTwoAttraction(intval($predict[0]), intval($predict[1]));
        $probabilities = array();
        $arrayA = array_values($userValues);
        $recomendation = array();

        foreach ($vars as $var) {
            $arrayB = array($var['destination_location'], $var['destination_type_id'], $var['destination_stars']);
            $tmp = $this->distanceEuclidean($arrayA, $arrayB);
            $itemtmp = array('value' => $tmp, 'id' => $var['destination_id']);
            array_push($probabilities, $itemtmp);
        }

        $array = $this->sortArray($probabilities, "value");

        for ($i = 0; $i < 6; $i++) {
            foreach ($vars as $var) {
                if ($var['destination_id'] == $array[$i]['id']) {
                    array_push($recomendation, $var);
                }
            }
        }
        echo json_encode($recomendation);
    }

    function trainingBasicSearch() {
        $model = new DestinyModel;
        $naiveBayes = new NaiveBayes();

        $vars = $model->selectAllBasicTraining();

        $labels = array('location_id' => 7, 'type_id' => 3, 'stars' => 5, 'attraction_id' => 7,);

        $possibleValues = array('location_id' => array(1, 2, 3, 4, 5, 6, 7),
            'type_id' => array(1, 2, 3),
            'stars' => array(1, 2, 3, 4, 5),
            'attraction_id' => array(1, 2, 3, 4, 5, 6, 7));

        $naiveBayes->training($vars, $labels, $possibleValues);

        $naiveBayes->saveTraining('basicsearch');
    }

    function sortArray($toOrderArray, $field, $inverse = true) {
        $position = array();
        $newRow = array();
        foreach ($toOrderArray as $key => $row) {
            $position[$key] = $row[$field];
            $newRow[$key] = $row;
        }
        if ($inverse) {
            arsort($position);
        } else {
            asort($position);
        }
        $returnArray = array();
        foreach ($position as $key => $pos) {
            $returnArray[] = $newRow[$key];
        }
        return $returnArray;
    }

    function clearArray($array = array()) {
        for ($j = 0; $j < count($array); $j++) {
            for ($i = 0; $i < count($array[$j]); $i++) {
                unset($array[$j][$i]);
            }
        }
        return $array;
    }

    /**
     * Funcion para realizar la distancia de euclides, requiere de 2 arreglos del mismo tamaño
     * @param type $arrayA
     * @param type $arrayB
     * @return type
     */
    function distanceEuclidean($arrayA, $arrayB) {
        if (count($arrayA) !== count($arrayB)) {
            return NULL;
        }
        $distance = 0;
        $length = count($arrayA);

        for ($i = 0; $i < $length; $i++) {
            $distance += pow(($arrayA[$i] - $arrayB[$i]), 2);
        }
        return 1 / ( 1 + sqrt((float) $distance));
    }

    /**
     * Redirecciona a insertar destino
     */
    function insert() {
        $this->view->show("insertDestinyView.php");
    }

    /**
     * Redirecciona a eliminar destino
     */
    function delete() {
        $model = new DestinyModel;
        $vars = $model->selectAll();
        $this->view->show("deleteDestinyView.php", $vars);
    }

    /**
     * Redirecciona a actualizar destino
     */
    function update() {
        $this->view->show("updateDestinyView.php");
    }

}
