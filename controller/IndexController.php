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
    private $dal;
    private $webhookCollection;

    public function __construct()
    {
        $this->gitPayLoadView = new \view\GitPayload();
        $this->nav  = new \view\Navigation();
        $this->dal = new \model\webhookFileSystemDAL();
        $this->webhookCollection = $this->dal->Read();
    }

    public function DoIndex()
    {

        if($this->nav->ClientWantsTheDownloadController())
        {
            $downloadController = new \controller\DownloadController($this->nav);
            $downloadController->DoDownload();
        }

        if($this->nav->ClientWantsToRepublish())
        {
            $webhook = $this->nav->GetWebhookBySha($this->webhookCollection);
            $republishController = new \controller\RepublishController($webhook, $this->nav);
            $republishController->DoRepublish();
        }

        if($this->nav->ClientWantsToViewCode())
        {
            $webhook = $this->nav->GetWebhookBySha($this->webhookCollection);
            $viewCodeController = new \controller\ViewCodeController($webhook, $this->nav);
            $viewCodeController->DoViewCode();
        }


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