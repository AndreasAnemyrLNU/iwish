<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-16
 * Time: 14:08
 */

namespace view;


class WebhookCommitCollection
{
    private $m_webhookCommits;

    public function Add(\view\WebhookCommit $wC)
    {
        $this->m_webhookCommits[] = $wC;
    }

    public function GetCollection()
    {
        return $this->m_webhookCommits;
    }

    public function HasSameSha(\view\WebhookCommit $toBeReturnedIfEquals)
    {
        foreach($this->m_webhookCommits as $wc)
        {
            if($this->GetTypeWebhookCommit($wc)->GetCommits()->getId() == $toBeReturnedIfEquals->GetCommits()->getId())
                return true;
        }
        return false;
    }

    private function GetTypeWebhookCommit(\view\WebhookCommit $wc)
    {
        return $wc;
    }
}