<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-10
 * Time: 11:11
 *
 */

    require_once("controller/IndexController.php");

    //module
    //github
    require_once("model/github/Added.php");
    require_once("model/github/Author.php");
    require_once("model/github/Commits.php");
    require_once("model/github/Committer.php");
    require_once("model/github/HeadCommit.php");
    require_once("model/github/Modified.php");
    require_once("model/github/Owner.php");
    require_once("model/github/Pusher.php");
    require_once("model/github/Removed.php");
    require_once("model/github/Repository.php");
    require_once("model/github/Sender.php");
    require_once("model/github/Webhook.php");
    require_once("view/GitPaylod.php");
    require_once("controller/GitController.php");


    $controller = new \controller\IndexController();
    $controller->doIndex();





