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
    // Start Region :::: applications webhookCommitCollection
    //***************************************************************//
    private $m_webhookCommitCollection;

    public function AddWebhookCommit(\view\WebhookCommits $wc)
    {
        // Just add if not exists before...
        if(!$this->GetTypeWebhookCollection($this->m_webhookCommitCollection)->HasSameSha($wc))
        {
            $this->GetTypeWebhookCollection($this->m_webhookCommitCollection)->Add($wc);
            $_SESSION['webhookCommitCollection'] = $this->m_webhookCommitCollection;
        }
    }

    public function GetWebhookCommitCollection()
    {
        return $this->m_webhookCommitCollection;
    }

    private function GetTypeWebhookCollection(\view\WebhookCommitCollection $wc)
    {
        return $wc;
    }
    //***************************************************************//
    // End Region :::: applications webhookCommitCollection

    public function ReloadSession()
    {
        if(isset($_SESSION['webhookCommitCollection']))
        {
            $this->m_webhookCommitCollection = $_SESSION['webhookCommitCollection'];
        }
        else
        {
            // Maybe not right to create this collection here. But the purpose is only for state...
            $this->m_webhookCommitCollection = new \view\WebhookCommitCollection();
        }
    }
}