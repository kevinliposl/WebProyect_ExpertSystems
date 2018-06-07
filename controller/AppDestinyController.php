<?php

/**
 * @version 1.0
 * @copyright (c) 2018, Kevin Sandoval Loaiza b46549, Pablo Barrientos Brenes b40920
 * @access public
 * @category controller
 * Class UserController     
 */
class AppDestinyController {

    private $distance;
    private $recommendation;

    /**
     * Constructor de clase
     */
    function __construct() {
        $this->view = new View();
        require_once 'model/DestinyModel.php';

        $this->distance = 0.3;
        $this->recommendation = array();
    }

    function distanceEuclidean($arrayA, $arrayB) {
        if (count($arrayA) !== count($arrayB)) {
            return NULL;
        }
        $distance = 0;
        $length = count($arrayA);

        for ($i = 0; $i < $length; $i++) {
            if (is_string($arrayA[$i])) {
                $distance += levenshtein($arrayA[$i], $arrayB[$i]) == 0 ? 0 : 1;
            } else {
                $distance += pow(($arrayA[$i] - $arrayB[$i]), 2);
            }
        }
        return 1 / ( 1 + sqrt((float) $distance));
    }

    /**
     * http://localhost/WebProject_ExpertSystems_B49020_B46549/?controller=AppDestiny&action=basicSearch&location=Puntarenas&attraction=1&type=2&stars=2
     * 
     * Funcion para busqueda basica 
     */
    function basicSearch() {
        if (isset($_REQUEST['location']) && isset($_REQUEST['attraction']) && isset($_REQUEST['type']) && isset($_REQUEST['stars'])) {
            $model = new DestinyModel;
            $vars = $model->selectAll();
            $arrayA = array($_REQUEST['location'], $_REQUEST['attraction'], $_REQUEST['type'], $_REQUEST['stars']);
            foreach ($vars as $var) {
                $arrayB = array($var['location'], $var['attraction'], $var['type'], $var['stars']);
                $tmp = $this->distanceEuclidean($arrayA, $arrayB);
                if ($tmp >= $this->distance) {
                    if (count($this->recommendation) <= 6) {
                        $facilities = $model->selectFacilities($var['id']);
                        $clear = $this->clearArray($facilities);
                        foreach ($clear as $t) {
                            array_push($var, $clear);
                        }
                        array_push($this->recommendation, $var);
                    }
                }
            }
            echo json_encode($this->clearArray($this->recommendation));
        } else {
            echo json_encode(array('result' => 0));
        }
    }

    /**
     * http://localhost/WebProject_ExpertSystems_B49020_B46549/?controller=AppDestiny&action=advancedSearch&location=Puntarenas&attraction=1&type=2&stars=2
     * 
     * Funcion para busqueda avanzada 
     */
    function advancedSearch() {
        if (isset($_REQUEST['style']) && isset($_REQUEST['price']) && isset($_REQUEST['location']) && isset($_REQUEST['attraction']) && isset($_REQUEST['type']) && isset($_REQUEST['stars'])) {
            $model = new DestinyModel;
            $vars = $model->selectAll();
            $arrayA = array($_REQUEST['price'], $_REQUEST['location'], $_REQUEST['attraction'], $_REQUEST['type'], $_REQUEST['stars']);
            foreach ($vars as $var) {
                $arrayB = array($var['price'], $var['location'], $var['attraction'], $var['type'], $var['stars']);
                $tmp = $this->distanceEuclidean($arrayA, $arrayB);
                if ($tmp >= $this->distance) {
                    if (count($this->recommendation) <= 6) {
                        $facilities = $model->selectFacilities($var['id']);
                        $clear = $this->clearArray($facilities);
                        foreach ($clear as $t) {
                            array_push($var, $clear);
                        }
                        array_push($this->recommendation, $var);
                    }
                }
            }
            echo json_encode($this->clearArray($this->recommendation));
        } else {
            echo json_encode(array('result' => 0));
        }
    }

    function clearArray($array = array()) {
        for ($j = 0; $j < count($array); $j++) {
            for ($i = 0; $i < count($array[$j]); $i++) {
                unset($array[$j][$i]);
            }
        }
        return $array;
    }

}
