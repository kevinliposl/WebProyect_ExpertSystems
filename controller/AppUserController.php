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
            echo json_encode(array('result' => $result['result']));
        } else {
            echo json_encode(array('result' => 0));
        }
    }

}
