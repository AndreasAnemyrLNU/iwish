<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-16
 * Time: 14:08
 * @author Andreas Anemyr <andreas@anemyr.se>
 */

namespace view;


class WebhookCommitCollection
{
    /**
     * @var
     */
    private $m_webhookCommits;

    /**
     * @param WebhookCommits $wC
     */
    public function Add(\view\WebhookCommits $wC)
    {
        $this->m_webhookCommits[] = $wC;
    }

    /**
     * @return mixed
     */
    public function GetCollection()
    {
        return $this->m_webhookCommits;
    }

    /**
     * @param WebhookCommits $toBeReturnedIfEquals
     * @return bool
     */
    public function HasSameSha(\view\WebhookCommits $toBeReturnedIfEquals)
    {
        foreach($this->m_webhookCommits as $wc)
        {
            if($this->GetTypeWebhookCommit($wc)->GetCommits()->getId() == $toBeReturnedIfEquals->GetCommits()->getId())
                return true;
        }
        return false;
    }

    /**
     * @param $sha
     * @return mixed
     */
    public function GetCommitBySha($sha)
    {
        foreach($this->m_webhookCommits as $webhookCommit)
        {
            if($this->GetTypeWebhookCommit($webhookCommit)->GetCommits()->getId() === $sha)
                return $webhookCommit;
        }
    }

    /**
     * @param WebhookCommits $wc
     * @return WebhookCommits
     */
    private function GetTypeWebhookCommit(\view\WebhookCommits $wc)
    {
        return $wc;
    }
}