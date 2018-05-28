<?php

/**
 * @author <kevin.sandoval@ucr.ac.cr><kevin.sandoval@ucr.ac.cr>
 * @version 1.0
 * @copyright (c) 2018, Kevin Sandoval Loaiza b46549, Pablo Barrientos Brenes b40920
 * @access public
 * @category controller
 * Class UserController     
 */
class UserController {

    /**
     * 
     */
    function __construct() {
        $this->view = new View();
        require_once 'model/UserModel.php';
    }

    /**
     * Funcion para iniciar sesión 
     */
    function signIn() {
        if (isset($_POST['user']) && isset($_POST['password'])) {
            $model = new UserModel;
            $result = $model->signIn($_POST['user'], $_POST['password']);
            echo json_encode(array('result' => "lalal"));
        } else {
            echo json_encode(array('result' => "Datos Incorrectos"));
        }
    }

}
