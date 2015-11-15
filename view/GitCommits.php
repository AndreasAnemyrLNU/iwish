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
    private $nav;

    public function __construct(\model\WebhookCollection $webhookCollection, \view\Navigation $n)
    {
        $this->webhookCollection = $webhookCollection;
        $this->nav = $n;
    }

    public function getHTML()
    {

        return
        "<div class='col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1'>
            <div class = 'panel panel-primary'>
                <div class = 'panel-heading'>
                    <h3 class = 'panel-title'>Webhook DATA!</h3>
                </div>
            </div>
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
            $ret .= "{$this->RenderWebHook($webhook)}";
        }
        return $ret;
    }

    private function RenderWebHook(\model\Webhook $w)
    {
     return
        "<div class='row'>
            <div class='col-xs-10 col-sm-10 col-md-10 col-lg-10'>
                <dl>
                    <dt>Ref:</dt>
                        <dd>{$w->getRef()}</dd>
                    <dt>Before:</dt>
                        <dd>{$w->getBefore()}</dd>
                    <dt>After:</dt>
                        <dd>{$w->getAfter()}</dd>
                    <dt>Created:</dt>
                        <dt>{$w->getCreated()}</dt>
                    <dt>Deleted:</dt>
                        <dt>{$w->getDeleted()}</dt>
                    <dt>Forced:</dt>
                        <dt>{$w->getForced()}</dt>
                    <dt>Base Ref:</dt>
                        <dt>{$w->getBaseRef()}</dt>
                    <dt>Compare:</dt>
                        <dt>{$w->getCompare()}</dt>
                    <dt>Created:</dt>
                        <dt>{$w->getCreated()}</dt>
                    <dt>Repository</dt>
                        <dd>{$this->GetRepository($w->getRepository())->getId()}</dd>
                </dl>
        </div>
        <div class='col-xs-2 col-sm-2 col-md-2 col-lg-2'>
            <img src={$this->GetSender($w->getSender())->getAvatarUrl()} class='img-responsive img-circle' alt='Avatar Pic'>
        </div>
        </div>
        <div class='row'>
            <div class='panel panel-success'>
                    <a href=?{$this->nav->RenderGetParam($this->nav->getControllerKey(), $this->nav->getDownLoadControllerValue())}&{$this->nav->RenderGetParam($this->nav->getShaKey(), $w->getCommits()->getId())}
                       class='btn btn-lg btn-warning btn-block'>Build Archive ({$w->getCommits()->getId()})
                    </a>
                    {$this->RenderCommits($w->getCommits(), $this->nav)}
                    {$this->RenderRepository($w->getRepository())}
                    {$this->RenderSender($w->getSender())}
            </div>
        </div>
        ";
    }

    private function GetRepository(\model\Repository $repository)
    {
        return $repository;
    }

    private function GetSender(\model\Sender $sender)
    {
        return $sender;
    }

    private function RenderCommits(\model\Commits $c, \view\Navigation $nav)
    {
        $html   = new \view\WebHookCommits($c, $nav);
        return  $html->getHTML();
    }

    private function RenderRepository(\model\Repository $r)
    {
        $html   = new \view\WebHookRepository($r);
        return  $html->getHTML();
    }

    private function RenderSender(\model\Sender $s)
    {
        $html   = new \view\WebHookSender($s);
        return  $html->getHTML();
    }

}