<?php

//Config
require_once '../app/config/config.php';

//Load helpers
require_once 'helpers/url_helper.php';
require_once 'helpers/session_helper.php';
require_once 'helpers/ip_helper.php';
require_once 'helpers/domainToId_helper.php';
require_once 'helpers/calculateDays_helper.php';
require_once 'helpers/passwordValidate_helper.php';
require_once 'libraries/PHPMailer/Email.php';

//Autoload core libraries
spl_autoload_register(function($className) {
    require_once 'libraries/' . $className . '.php';
});
