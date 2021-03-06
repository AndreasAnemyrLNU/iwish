<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr...
 * Date: 2015-11-10
 * Time: 11:26
 * @author Andreas Anemyr <andreas@anemyr.se>
 */
namespace controller;

/**
 * Class IndexController
 * @package controller
 */
class IndexController
{
    private $gitPayLoadView;
    private $nav;
    private $dal;
    private $webhookCollection;
    private $m_sessionHandler;

    public function __construct()
    {
        $this->gitPayLoadView = new \view\GitPayload();
        $this->m_sessionHandler =  new \model\SessionHandler();
        $this->nav  = new \view\Navigation($this->m_sessionHandler);
        $this->dal = new \model\webhookFileSystemDAL();


        if($this->webhookCollection == null)
            $this->webhookCollection = $this->dal->Read();
    }

    /**
     * @return \view\GitCommits
     */
    public function DoIndex()
    {
        try
        {
            new \controller\SessionController($this->nav, $this->m_sessionHandler);

            $this->nav->ClientTogglesVisibility();

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
                $previewCode = $viewCodeController->DoViewCode();
            }


            //Deccide if Request is from github's payload.
            //If it is -> system should serialize a webhook.
            if($this->gitPayLoadView->DidGithubSendArchiveParamSetToTrue())
            {
                $gitController = new \controller\GitController();
                $gitController->doParse($this->gitPayLoadView->GetPayLoad());
            }

            $view = new \view\GitCommits($this->webhookCollection, $this->nav, $previewCode);
            return $view;
        }
        catch(\Exception $e)
        {
            $view = new \view\GitCommits($this->webhookCollection, $this->nav, $previewCode, $e);
            return $view;
        }

    }
}