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

        return "<div class='col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1'>
                    <div class = 'panel panel-primary'>
                        <div class = 'panel-heading'>
                            <h3 class = 'panel-title'>History of commits to github for this project!</h3>
                        </div>
                        <div class = 'panel-body'>
                            <div class='container col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1'>
                                {$this->ExtractWebhook()}
                            </div>
                        </div>
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
        return "<div class='row'>
                    <div class='col-xs-10 col-sm-10 col-md-10 col-lg-10'>
                        <p>{$w->getAfter()}</p>
                        <p>{$w->getBefore()}</p>
                        <p>{$this->GetRepository($w->getRepository())->getId()}</p>
                    </div>
                    <div class='col-xs-2 col-sm-2 col-md-2 col-lg-2'>
                        <img src={$this->GetSender($w->getSender())->getAvatarUrl()} class='img-responsive img-circle' alt='Avatar Pic'>
                    </div>
                </div>";
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