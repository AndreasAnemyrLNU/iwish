<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-11
 * Time: 22:43
 */

namespace view;


class GitCommits
{
    private $webhookCollection;

    public function __construct(\model\WebhookCollection $webhookCollection)
    {
        $this->webhookCollection = $webhookCollection;
    }

    public function getHTML()
    {

        return "<div class = 'panel panel-primary'>
                    <div class = 'panel-heading'>
                        <h3 class = 'panel-title'>History of commits to github for this project!</h3>
                    </div>
                    <div class = 'panel-body'>
                        {$this->ExtractWebhook()}
                    </div>
                </div>";
    }

    private function ExtractWebhook()
    {
        $webhooks = $this->webhookCollection->getWebhooks();
        $ret = "";
        foreach($webhooks as $webhook)
        {
            $ret .= "<div class='well'>{$this->RenderWebHook($webhook)}</div>";
        }
        return $ret;
    }

    private function RenderWebHook(\model\Webhook $w)
    {
        return "<p>{$w->getAfter()}</p>
                <p>{$w->getBefore()}</p>
                <p>{$this->GetRepository($w->getRepository())->getId()}</p>
                <div><img src={$this->GetSender($w->getSender())->getAvatarUrl()} class='img-thumbnail' alt='Cinque Terre'></div>";
    }

    private function GetRepository(\model\Repository $repository)
    {
        return $repository;
    }

    private function GetSender(\model\Sender $sender)
    {
        return $sender;
    }


}