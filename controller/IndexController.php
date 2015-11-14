<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr...
 * Date: 2015-11-10
 * Time: 11:26
 *
 */

namespace controller;

class IndexController
{
    private $gitPayLoadView;
    private $nav;

    public function __construct()
    {
        $this->gitPayLoadView = new \view\GitPayload();
        $this->nav  = new \view\Navigation();
    }

    public function DoIndex()
    {

        if($this->nav->ClientWantsTheDownloadController())
        {
            $downloadController = new \controller\DownloadController($this->nav);
            $downloadController->DoDownload();
        }


        $saver = new \model\SaveOldVersionInArchive();
        $saver->SaveAllModifiedFilesPhysicallyByCommitVersion('d7c44a150d1d260c80eecac1e0b0b2205d49b3ae');

        //Deccide if Request is from github's payload.
        //If it is -> system should serialize a webhook.
        if($this->gitPayLoadView->DidGithubSendArchiveParamSetToTrue())
        {
            $gitController = new \controller\GitController();
            $gitController->doParse($this->gitPayLoadView->GetPayLoad());
        }

        $dal = new \model\webhookFileSystemDAL();
        $webCollection = $dal->Read();

        $view = new \view\GitCommits($webCollection, $this->nav);

        return $view;
    }
}