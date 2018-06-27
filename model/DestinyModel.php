<?php

/**
 * @author <kevin.sandoval@ucr.ac.cr><brogudbarrientos@gmail.com>
 * @version 1.0
 * @copyright (c) 2018, Kevin Sandoval Loaiza b46549, Pablo Barrientos Brenes b40920
 * @access public
 * @category Model
 * Class UserModel     
 */
class DestinyModel {

    private $db;

    /**
     * class constructor
     */
    function __construct() {
        require_once 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }

    /**
     * Funcion para obtener todos los destinos
     * @return type
     */
    function selectAll() {
        $query = $this->db->prepare("call sp_select_all_destination();");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }

    function selectAllBasicTraining() {
        $query = $this->db->prepare("call sp_select_all_destination_basic_training();");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }

    function saveTraining($classProbability, $chanceClassFrequency, $mode) {
        $classProbability = json_encode($classProbability);
        $chanceClassFrequency = json_encode($chanceClassFrequency);
        $query = $this->db->prepare("call sp_save_all_naive_bayes_data('$mode','$classProbability','$chanceClassFrequency')");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }

    /**
     * Funcion para obtener facilidades segun destino
     * @param type $id
     * @return type
     */
    function selectFacilities($id) {
        $query = $this->db->prepare("call sp_select_facilities(:id);");
        $query->execute(array('id' => $id));
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }

    /**
     * Funcion para obtener facilidades segun destino
     * @param type $id
     * @return type
     */
    function selectAllAttraction() {
        $query = $this->db->prepare("call sp_select_all_attraction();");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }

    /**
     * Funcion para obtener facilidades segun destino
     * @param type $id
     * @return type
     */
    function selectAllLocation() {
        $query = $this->db->prepare("call sp_select_all_location();");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }

    /**
     * Funcion para obtener facilidades segun destino
     * @param type $id
     * @return type
     */
    function selectAllTypes() {
        $query = $this->db->prepare("call sp_select_all_type();");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }

    function getAllTrainingData($mode) {

        $query = $this->db->prepare("call sp_get_all_naive_bayes_data('$mode')");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();
        $rows = count($data);
        $allTrainingData = array();
        for ($i = 0; $i < $rows; $i++) {
            $dataArray = array();
            $dataArray["classProbability"] = $data[$i]["data_classProbability"];
            $dataArray["chanceClassFrequency"] = $data[$i]["data_chanceClassFrequency"];
            array_push($allTrainingData, $dataArray);
        }
        return $allTrainingData;
    }

    function selectGetTwoAttraction($one, $two) {
        $query = $this->db->prepare("call sp_get_two_destination('$one','$two');");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }

    function delete($id) {
        $query = $this->db->prepare("call sp_delete_destination(:id);");
        $query->execute(array('id' => $id));
        $result = $query->fetch();
        $query->closeCursor();
        return $result;
    }

}
