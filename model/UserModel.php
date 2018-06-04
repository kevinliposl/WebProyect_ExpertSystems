<?php

/**
 * @author <kevin.sandoval@ucr.ac.cr><brogudbarrientos@gmail.com>
 * @version 1.0
 * @copyright (c) 2018, Kevin Sandoval Loaiza b46549, Pablo Barrientos Brenes b40920
 * @access public
 * @category Model
 * Class UserModel     
 */
class UserModel {

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
    function signIn($mail, $password) {
        $query = $this->db->prepare("call sp_sign_in_user(:mail,:password);");
        $query->execute(array('mail' => $mail, 'password' => $password));
        $result = $query->fetch();
        $query->closeCursor();
        return $result;
    }

    /**
     * @return array result
     * function *****************
     */
    function signUp($mail, $password, $name, $lastname, $style) {
        $query = $this->db->prepare("call sp_sign_up_user(:mail,:password,:name,:lastname,:style);");
        $query->execute(array('mail' => $mail, 'password' => $password, 'name' => $name, 'lastname' => $lastname, 'style' => $style));
        $result = $query->fetch();
        $query->closeCursor();
        return $result;
    }

}
