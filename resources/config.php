<?php

//output buffering to help load pre defined elements
ob_start();

//Turns on sessions
session_start();

// TEMPLATES

//looks for the constant directory separator if it doesn't find - defines it.
defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);
//sets the template name - define the template_front using the path to templates folder / front folder
defined("TEMPLATE_FRONT") ? null : define("TEMPLATE_FRONT", __DIR__ . DS . "templates/front");
//sets the template name - define the template_back using the path to templates folder / back folder
defined("TEMPLATE_BACK") ? null : define("TEMPLATE_BACK", __DIR__ . DS . "templates/back");

// DATABASE

//Defines the DB Host - will need to reassign on deployment
defined("DB_HOST") ? null : define("DB_HOST", "localhost");
//Defines the DB User - will need to reassign on deployment
defined("DB_USER") ? null : define("DB_USER", "root");
//Defines the DB password (STARTS EMPTY)
defined("DB_PASS") ? null : define("DB_PASS", "");
//Defines the DB name
defined("DB_NAME") ? null : define("DB_NAME", "ecom_db");

//Connects to MySQLite database - (research for deployment)
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//Requires the functions.php file with all of our functions
require_once("functions.php");












//displays folder and file paths with the magic constant DIR - TEMP_FRONT / TEMP_BACK / DS
//echo TEMPLATE_FRONT;
