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
     * Funcion para iniciar sesion
     * @param type $mail
     * @param type $password
     * @return type
     */
    function signIn($mail, $password) {
        $query = $this->db->prepare("call sp_sign_in_user(:mail,:password);");
        $query->execute(array('mail' => $mail, 'password' => $password));
        $result = $query->fetch();
        $query->closeCursor();
        return $result;
    }

    /**
     * Funcion para registrar usuario
     * @param type $mail
     * @param type $password
     * @param type $name
     * @param type $lastname
     * @param type $style
     * @return type
     */
    function signUp($mail, $password, $name, $lastname, $style) {
        $query = $this->db->prepare("call sp_sign_up_user(:mail,:password,:name,:lastname,:style);");
        $query->execute(array('mail' => $mail, 'password' => $password, 'name' => $name, 'lastname' => $lastname, 'style' => $style));
        $result = $query->fetch();
        $query->closeCursor();
        return $result;
    }

    /**
     * Funcion para seleccionar contraseña de usuario
     * @param type $mail
     * @return type
     */
    function rememberPassword($mail) {
        $query = $this->db->prepare("call sp_select_user(:mail);");
        $query->execute(array('mail' => $mail));
        $result = $query->fetch();
        $query->closeCursor();
        return $result;
    } 
    /**
     * Funcion para seleccionar usuario
     * @param type $mail
     * @return type
     */
    function selectUser($mail) {
        $query = $this->db->prepare("call sp_select_user(:mail);");
        $query->execute(array('mail' => $mail));
        $result = $query->fetch();
        $query->closeCursor();
        return $result;
    }

    /**
     * Funcion para actualizar usuario
     * @param type $mail
     * @param type $password
     * @param type $name
     * @param type $lastname
     * @param type $style
     * @return type
     */
    function updateUser($mail, $password, $name, $lastname, $style) {
        $query = $this->db->prepare("call sp_update_user(:mail,:password,:name,:lastname,:style);");
        $query->execute(array('mail' => $mail, 'password' => $password, 'name' => $name, 'lastname' => $lastname, 'style' => $style));
        $result = $query->fetch();
        $query->closeCursor();
        return $result;
    }

}
