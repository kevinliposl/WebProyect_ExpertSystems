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
    }

    /**
     * Funcion que calcula la distancia entre 2 vectores del mismo tamaño, con sus caracteristicas ordenadas. 
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
     * Funcion para busqueda basica 
     */
    function basicSearch() {
        if (isset($_REQUEST['location']) && isset($_REQUEST['attraction']) && isset($_REQUEST['type']) && isset($_REQUEST['qualification'])) {
            $model = new DestinyModel;
            $result = $model->selectAll();
            $arrayA = array($_POST['ca'], $_POST['ec'], $_POST['ea'], $_POST['or']);
            foreach ($vars as $var) {
                $arrayB = array($var['ca'], $var['ec'], $var['ea'], $var['or']);
                $tmp = $this->distanceEuclidean($arrayA, $arrayB);
                if ($tmp > $this->distance) {
                    $this->distance = $tmp;
                    $this->tmp = $var['name'];
                }
            }
            echo json_encode(array('result' => $result));
        } else {
            echo json_encode(array('result' => 0));
        }
    }

    /**
     * Funcion para busqueda avanzada 
     */
    function advancedSearch() {
        if (isset($_REQUEST['mail']) && isset($_REQUEST['password'])) {
            $model = new UserModel;
            $result = $model->signIn($_POST['mail'], $_POST['password']);
            $this->onSession($result['result'], $_POST['mail'], $result['role']);
            echo json_encode(array('result' => $result['result']));
        } else {
            echo json_encode(array('result' => 0));
        }
    }

}
