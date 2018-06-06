<?php

/**
 * @author <kevin.sandoval@ucr.ac.cr><kevin.sandoval@ucr.ac.cr>
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
     * 
     * ?controller=AppUser&action=signIn
     * Funcion para iniciar sesión 
     */
    function signIn() {
        if (isset($_REQUEST['mail']) && isset($_REQUEST['password'])) {
            $model = new UserModel;
            $result = $model->signIn($_REQUEST['mail'], $_REQUEST['password']);
            echo json_encode(array('result' => $result));
        } else {
            echo json_encode(array('result' => 0));
        }
    }

    /**
     * ?controller=AppUser&action=signUp&mail=admas@adm.com&password=111&name=ADMIN&lastname=ADMIN&style=Conservador
     * Funcion para registrar
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
     * /?controller=AppUser&action=updateUser&mail=adm@adm.com&password=111&name=ADMIN&lastname=ADMIN&style=Conservador
     * ?controller=AppUser&action=updateUser
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
     * 
     * ?controller=AppUser&action=selectUser
     * Funcion para seleccionar usuario 
     */
    function selectUser() {
        if (isset($_REQUEST['mail'])) {
            $model = new UserModel;
            $result = $model->selectUser($_REQUEST['mail']);
            echo json_encode(array('result' => $result));
        } else {
            echo json_encode(array('result' => 0));
        }
    }

}
