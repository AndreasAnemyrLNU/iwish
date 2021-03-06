<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-10
 * Time: 11:11
 *@author Andreas Anemyr <andreas@anemyr.se>
 */
    error_reporting(0);



    require_once("ErrorHandler.php");

    require_once("model/archive/SaveOldVersionInArchive.php");
    require_once("model/archive/RepublishFile.php");
    require_once("model/dal/WebHookFileSystemDAL.php");
    require_once("model/archive/ViewCode.php");
    require_once("model/SessionHandler.php");
    require_once("view/IndexPage.php");
    require_once("view/GitCommits.php");
    require_once("view/css/BootstrapCDN.php");
    require_once("view/js/JqueryCDN.php");
    require_once("view/Navigation.php");
    require_once("view/WebHookAdded.php");
    require_once("view/WebHookAuthor.php");
    require_once("view/WebhookCommits.php");
    require_once("view/WebhookCommitCollection.php");
    require_once("view/WebHookCommitter.php");
    require_once("view/WebHookModified.php");
    require_once("view/WebHookRemoved.php");
    require_once("view/WebHookRepository.php");
    require_once("view/WebHookSender.php");
    require_once("controller/IndexController.php");
    require_once("controller/DownloadController.php");
    require_once("controller/RepublishController.php");
    require_once("controller/ViewCodeController.php");
    require_once("controller/SessionController.php");

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
    require_once("model/github/WebhookCollection.php");
    require_once("view/GitPaylod.php");
    require_once("controller/GitController.php");
    // github

    session_start();

    $controller = new \controller\IndexController();
    $view = $controller->DoIndex();

    $index = new \view\indexPage();
    echo $index->getHTML($view->getHTML());


