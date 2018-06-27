<?php

require 'libs/FrontController.php';
require 'libs/SSession.php';
require 'libs/SMail.php';
FrontController::main();
SSession::getInstance();
SMail::getInstance();