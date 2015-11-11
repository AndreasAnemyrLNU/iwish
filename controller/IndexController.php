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

        $dal = new \model\webhookFileSystemDAL();
        $webCollection = $dal->Read();

        return new \view\GitCommits($webCollection);

        if($this->gitPayLoadView->DidGithubSendArchiveParamSetToTrue())
        {
            $gitController = new \controller\GitController();
            $gitController->doParse($this->gitPayLoadView->GetPayLoad());
        }
    }
}