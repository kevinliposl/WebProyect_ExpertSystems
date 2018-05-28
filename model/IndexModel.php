<?php

/**
 * @author <kevin.sandoval@ucr.ac.cr><brogudbarrientos@gmail.com>
 * @version 1.0
 * @copyright (c) 2018, Kevin Sandoval Loaiza b46549
 * @access public
 * @category Model
 * Class IndexModel     
 */
class IndexModel {

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
     * function to select all enclosure style
     */
    function selectAll() {
        $query = $this->db->prepare("call sp_select_all_style()");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }

}
