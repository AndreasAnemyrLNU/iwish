<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-10
 * Time: 11:26
 */

namespace controller;


use view\GitPayload;

class IndexController
{

    private $gitPayLoadView;

    /**
     * IndexController constructor.
     */
    public function __construct()
    {
        $this->gitPayLoadView = new GitPayload();
    }

    public function doIndex()
    {
        if($this->gitPayLoadView->DidGithubSendArchiveParamSetToTrue())
        {
            $controller = new \controller\GitController();
            $controller->doGit();
        }
    }
}

