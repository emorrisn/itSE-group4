<?php

/** 
 * Autoload.php
 *  Pre-loads all the files within the project so that the code is cleaner.
 *  As the project itself is fairly small, this won't make a great impact performance.
 */

// error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));


// Config
require_once(__DIR__ . "/App/Config/DatabaseConfig.php");

// Helpers
require_once(__DIR__ . "/App/Helpers/DatabaseHelper.php");
require_once(__DIR__ . "/App/Helpers/AuthenticationHelper.php");

// Models
require_once(__DIR__ . "/App/Models/Model.php");
require_once(__DIR__ . "/App/Models/User.php");

// Controller
require_once(__DIR__ . "/App/Controllers/accountController.php");
require_once(__DIR__ . "/App/Controllers/dashboardController.php");
