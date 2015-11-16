<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-16
 * Time: 09:15
 */

namespace controller;


class SessionController
{
    private $m_sessionHandler;
    private $m_nav;

    public function __construct(\view\Navigation $n, \model\SessionHandler $sh)
    {
        $this->m_sessionHandler = $sh;
        $this->m_nav = $n;
        $this->m_sessionHandler->ReloadSession();
        $this->DoSession();
    }

    public function DoSession()
    {
        print_r($_SESSION);

        //if($this->m_nav->DidClientChangeVisibleStatusForWebhookCommit())
        //    $this->m_sessionHandler->AddWebhook($this->m_nav->ContentToChangeVisibilityFor());
    }
}