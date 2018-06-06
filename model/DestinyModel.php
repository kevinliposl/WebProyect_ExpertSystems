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
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }

    /**
     * @return array result
     * function *****************
     */
    function selectAll() {
        $query = $this->db->prepare("call sp_select_all_destination();");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }
}
