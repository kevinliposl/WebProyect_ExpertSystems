<?php

require 'libs/SSession.php';
SSession::getInstance();

require 'libs/FrontController.php';
FrontController::main();

require 'libs/SMail.php';
SMail::getInstance();
?>