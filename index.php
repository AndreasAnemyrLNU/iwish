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
require_once("model/github/added.php");
require_once("model/github/author.php");
require_once("model/github/commits.php");
require_once("model/github/Committer.php");
require_once("model/github/HeadCommit.php");
require_once("model/github/modified.php");
require_once("model/github/Owner.php");
require_once("model/github/removed.php");
require_once("model/github/Pusher.php");
require_once("model/github/Repository.php");
require_once("model/github/Sender.php");
require_once("model/github/webhook.php");
//

$indexController = new \controller\IndexController();

$indexController->doIndex();