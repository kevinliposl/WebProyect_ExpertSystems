<?php

/**
 * @version 1.0
 * @copyright (c) 2018, Kevin Sandoval Loaiza b46549, Pablo Barrientos Brenes b40920
 * @access public
 * @category controller
 * Class AppUserController     
 */
class AppUserController {

    /**
     * Constructor de clase
     */
    function __construct() {
        $this->view = new View();
        require_once 'model/UserModel.php';
    }

    /**
     * Funcion para iniciar sesión desde android
     */
    function signIn() {
        if (isset($_REQUEST['mail']) && isset($_REQUEST['password'])) {
            $model = new UserModel;
            $result = $model->signIn($_REQUEST['mail'], $_REQUEST['password']);
            echo json_encode(array('result' => $this->clearArray($result)));
        } else {
            echo json_encode(array('result' => 0));
        }
    }

    /**
     * Funcion para registrarse desde android
     */
    function signUp() {
        if (isset($_REQUEST['mail']) && isset($_REQUEST['password']) && isset($_REQUEST['name']) && isset($_REQUEST['lastname']) && isset($_REQUEST['style'])) {
            $model = new UserModel;
            $result = $model->signUp($_REQUEST['mail'], $_REQUEST['password'], $_REQUEST['name'], $_REQUEST['lastname'], $_REQUEST['style']);
            echo json_encode(array('result' => $result['result']));
        } else {
            echo json_encode(array('result' => 0));
        }
    }

    /**
     * Funcion para actualizar usuario 
     */
    function updateUser() {
        if (isset($_REQUEST['mail']) && isset($_REQUEST['password']) && isset($_REQUEST['name']) && isset($_REQUEST['lastname']) && isset($_REQUEST['style'])) {
            $model = new UserModel;
            $result = $model->updateUser($_REQUEST['mail'], $_REQUEST['password'], $_REQUEST['name'], $_REQUEST['lastname'], $_REQUEST['style']);
            echo json_encode(array('result' => $result['result']));
        } else {
            echo json_encode(array('result' => 0));
        }
    }

    /**
     * Funcion para seleccionar usuario 
     */
    function selectUser() {
        if (isset($_REQUEST['mail'])) {
            $model = new UserModel;
            $result = $model->selectUser($_REQUEST['mail']);
            echo json_encode(array('result' => $this->clearArray($result)));
        } else {
            echo json_encode(array('result' => 0));
        }
    }
    /**
     * Funcion para limpiar un array
     * @param type $array
     * @return type
     */
    function clearArray($array = array()) {
        for ($j = 0; $j < count($array); $j++) {
            unset($array[$j]);
        }
        return $array;
    }

}
