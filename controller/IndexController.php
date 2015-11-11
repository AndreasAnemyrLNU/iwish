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

    public function __construct()
    {
        $this->gitPayLoadView = new \view\GitPayload();
    }

    public function DoIndex()
    {

        if($this->gitPayLoadView->DidGithubSendArchiveParamSetToTrue())
        {
            $gitController = new \controller\GitController();
            $gitController->doParse($this->gitPayLoadView->GetPayLoad());
        }

        $dal = new \model\webhookFileSystemDAL();
        $webCollection = $dal->Read();



        $view = new \view\GitCommits($webCollection);

        return $view;

    }
}