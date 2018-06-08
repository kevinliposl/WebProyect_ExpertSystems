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
        $this->distance = 0;
        $this->recommendation = array();
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
     * Funcion para busqueda basica la busqueda basica, que requiere de la 
     * localizacion (Provincia), atraccion(Hotel,Restaurante..), tipo(Costera, Urbana, De montaña) y estrella(1-5)
     */
    function basicSearch() {
        if (isset($_REQUEST['location']) && isset($_REQUEST['attraction']) && isset($_REQUEST['type']) && isset($_REQUEST['stars'])) {
            $model = new DestinyModel;
            $vars = $model->selectAll();
            $probabilities = array();
            $arrayA = $this->transformInputBasicSearch($_REQUEST);
            foreach ($vars as $var) {
                $arrayB = array($var['location_id'], $var['attraction_id'], $var['type_id'], $var['stars']);
                $tmp = $this->distanceEuclidean($arrayA, $arrayB);
                $itemtmp = array('value' => $tmp, 'id' => $var['id']);
                array_push($probabilities, $itemtmp);
            }
            $array = $this->sortArray($probabilities, "value");
            for ($i = 0; $i < 6; $i++) {
                array_push($this->recommendation, $vars[($array[$i]["id"])]);
            }
            echo json_encode($this->clearArray($this->recommendation));
        } else {
            echo json_encode(array('result' => 0));
        }
    }

    /**
     * Funcion para transformar datos de la busqueda basica
     * @param type $array
     * @return type
     */
    function transformInputBasicSearch($array = array()) {
        $locations = array('San José', 'Alajuela', 'Cartago', 'Heredia', 'Puntarenas', 'Guanacaste', 'Limón');
        $attractions = array('Parques Nacionales', 'Ruinas y Lugares Históricos', 'Galerías y Museos', 'Jardines botánicos y zoológicos', 'Miradores', 'Hotel', 'Restaurante');
        $types = array('Urbano', 'Costera', 'De Montaña');
        $location = 0;
        $attraction = 0;
        $type = 0;
        for ($i = 0; $i < count($locations); $i++) {
            if (strcasecmp(strtolower($array['location']), strtolower($locations[$i])) == 0) {
                $location = $i + 1;
            }
        }
        for ($i = 0; $i < count($attractions); $i++) {
            if (strcasecmp(strtolower($array['attraction']), strtolower($attractions[$i])) == 0) {
                $attraction = $i + 1;
            }
        }
        for ($i = 0; $i < count($types); $i++) {
            if (strcasecmp(strtolower($array['type']), strtolower($types[$i])) == 0) {
                $type = $i + 1;
            }
        }
        return array($location, $attraction, $type, $array['stars']);
    }

    /**
     * Funcion para busqueda basica la busqueda basica, que requiere de la 
     * localizacion (Provincia), atraccion(Hotel,Restaurante..), tipo(Costera, Urbana, De montaña), estrella(1-5), precio, estilo del usuario.
     * https://pktourism.000webhostapp.com/?controller=AppDestiny&action=advancedSearch&location=Puntarenas&attraction=Hotel&type=Costera&stars=2&style=Conservador&price=100
     */
    function advancedSearch() {
        if (isset($_REQUEST['style']) && isset($_REQUEST['price']) && isset($_REQUEST['location']) && isset($_REQUEST['attraction']) && isset($_REQUEST['type']) && isset($_REQUEST['stars'])) {
            $model = new DestinyModel;
            $vars = $model->selectAll();
            $probabilities = array();
            $arrayA = $this->transformInputAdvancedSearch($_REQUEST);
            foreach ($vars as $var) {
                $arrayB = array($var['style'], $var['price'], $var['location_id'], $var['attraction_id'], $var['type_id'], $var['stars']);
                $tmp = $this->distanceEuclidean($arrayA, $arrayB);
                if ($arrayA[0] == $arrayB[0]) {
                    $tmp += 0.05;
                }
                $itemtmp = array('value' => $tmp, 'id' => $var['id']);
                array_push($probabilities, $itemtmp);
            }
            $array = $this->sortArray($probabilities, "value");
            for ($i = 0; $i < 6; $i++) {
                array_push($this->recommendation, $vars[($array[$i]["id"])]);
            }
            echo json_encode($this->clearArray($this->recommendation));
        } else {
            echo json_encode(array('result' => 0));
        }
    }

    /**
     * Funcion para transformar datos de la busqueda basica
     * @param type $array
     * @return type
     */
    function transformInputAdvancedSearch($array = array()) {
        $locations = array('San José', 'Alajuela', 'Cartago', 'Heredia', 'Puntarenas', 'Guanacaste', 'Limón');
        $attractions = array('Parques Nacionales', 'Ruinas y Lugares Históricos', 'Galerías y Museos', 'Jardines botánicos y zoológicos', 'Miradores', 'Hotel', 'Restaurante');
        $types = array('Urbano', 'Costera', 'De Montaña');
        $styles = array('Conservador', 'Investigador', 'Aventurero');
        $style = 0;
        $location = 0;
        $attraction = 0;
        $type = 0;
        for ($i = 0; $i < count($locations); $i++) {
            if (strcasecmp(strtolower($array['location']), strtolower($locations[$i])) == 0) {
                $location = $i + 1;
            }
        }
        for ($i = 0; $i < count($attractions); $i++) {
            if (strcasecmp(strtolower($array['attraction']), strtolower($attractions[$i])) == 0) {
                $attraction = $i + 1;
            }
        }
        for ($i = 0; $i < count($types); $i++) {
            if (strcasecmp(strtolower($array['type']), strtolower($types[$i])) == 0) {
                $type = $i + 1;
            }
        }
        for ($i = 0; $i < count($styles); $i++) {
            if (strcasecmp(strtolower($array['style']), strtolower($styles[$i])) == 0) {
                $style = $i + 1;
            }
        }
        return array($style, $array['price'], $location, $attraction, $type, $array['stars']);
    }

    /**
     * Funcion para limpiar array
     * @param type $array
     * @return type
     */
    function clearArray($array = array()) {
        for ($j = 0; $j < count($array); $j++) {
            for ($i = 0; $i < count($array[$j]); $i++) {
                unset($array[$j][$i]);
            }
        }
        return $array;
    }

    /**
     * Funcion para ordenar arreglo
     * @param type $toOrderArray
     * @param type $field
     * @param type $inverse
     * @return type
     */
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

}
