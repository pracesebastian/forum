<?php
ob_start();
session_start();
// Use an autoloader!
require 'include/__base_.php';
require 'include/functions.php';
require 'include/router.php';

require 'include/controller.php';
require 'include/model.php';
require 'include/view.php';



$app = new Router();
