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
     * Constructor de clase
     */
    function __construct() {
        $this->view = new View();
        require_once 'model/UserModel.php';
    }

    /**
     * Funcion para iniciar sesión 
     */
    function signIn() {
        if (isset($_POST['mail']) && isset($_POST['password']) && !SSession::getInstance()->__isset("role")) {
            $model = new UserModel;
            $result = $model->signIn($_POST['mail'], $_POST['password']);
            $this->onSession($result['result'], $_POST['mail'], $result['role']);
            echo json_encode(array('result' => $result['result']));
        } else {
            echo json_encode(array('result' => 0));
        }
    }

    /**
     * Funcion para cerrar sesión 
     */
    function signOut() {
        if (SSession::getInstance()->__isset("role")) {
            $session = SSession::getInstance();
            $session->destroy();
            $this->view->show("indexView.php");
        } else {
            $this->view->show("indexView.php");
        }
    }

    /**
     * Funcion para dar permisos 
     */
    private function onSession($result, $mail, $role) {
        if (intval($result)) {
            SSession::getInstance()->mail = $mail;
            SSession::getInstance()->role = $role;
        }
    }

}
