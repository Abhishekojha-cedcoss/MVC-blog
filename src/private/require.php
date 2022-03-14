<?php
use App\Libraries\Core;

session_start();
require_once(dirname(__FILE__).'/config/variables.php');
require_once(dirname(__FILE__).'/libraries/Controller.php');
require_once(dirname(__FILE__).'/libraries/Core.php');
require_once(dirname(__FILE__).'/libraries/Database.php');

$core = new Core();

// echo APPPATH;
