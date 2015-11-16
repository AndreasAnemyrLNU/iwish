<?php

namespace model;

/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-16
 * Time: 09:13
 */
class SessionHandler
{
    private $m_webhookCollection;

    public function __construct()
    {
        $this->ReloadSession();
    }


    public function AddWebhook(\view\WebhookCommit $wc)
    {
        // Just add if not exists before...
        if(!$this->GetTypeWebhookCollection($this->m_webhookCollection)->HasSameSha($wc))
        {
            $this->GetTypeWebhookCollection($this->m_webhookCollection)->Add($wc);
            $_SESSION['webhookCollection'] = $this->m_webhookCollection;
        }
    }

    public function GetWebhookCollection()
    {
        return $this->m_webhookCollection;
    }

    public function ReloadSession()
    {
        if(isset($_SESSION['webhookCollection']))
        {
            $this->m_webhookCollection = $_SESSION['webhookCollection'];
        }
        else
        {
            // Maybe not right to create this collection here. But the purpose is only for state...
            $this->m_webhookCollection = new \view\WebhookCommitCollection();
        }
    }

    private function GetTypeWebhookCollection(\view\WebhookCommitCollection $wc)
    {
        return $wc;
    }
}