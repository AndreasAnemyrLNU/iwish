<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-10
 * Time: 11:11
 */


require_once("controller/indexController.php");


//module
//github
require_once("model/github/commits.php");
require_once("model/github/webhook.php");
//



$indexController = new \controller\indexController();

$indexController->doIndex();