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

    function saveTraining($classProbability,$chanceClassFrequency, $mode){
        $classProbability = json_encode($classProbability);
        $chanceClassFrequency = json_encode($chanceClassFrequency);
        $query = $this->db->prepare("call sp_save_all_naive_bayes_data('$mode','$classProbability','$chanceClassFrequency')");
        $query->execute();
        $result = $query->fetch();
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
    function selectAllTypes() {
        $query = $this->db->prepare("call sp_select_all_type();");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }

}
