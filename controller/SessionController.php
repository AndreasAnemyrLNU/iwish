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
        // The first GET Request reads objects and store it by SessionHandler....
        // So here we do reload!
        $this->m_sessionHandler->ReloadSession();
        $this->DoSession();
    }

    public function DoSession()
    {
        // This methode reacts client request...
        //$collection = $this->m_sessionHandler->GetWebhookCollection()->GetCollection();

        //if($this->m_nav->ClientWantsToMakeContentVisible())
        //{
        //    $webhookCommit = $this->m_nav->MakeContentVisible();
        //    $this->GetTypeWebhookCommit($webhookCommit)->
        //}

    }

    public function GetTypeWebhookCommit(\view\WebhookCommits $wc){return $wc;}
}