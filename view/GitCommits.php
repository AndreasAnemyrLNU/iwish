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
    private $m_webhookCollection;
    private $m_nav;
    private $m_previewCode;
    private $m_exception;
    private $m_errorHandler;

    public function __construct(\model\WebhookCollection $webhookCollection, \view\Navigation $n, $previewCode ="", \Exception $exception = null)
    {
        $this->m_errorHandler = new \ErrorHandler();
        $this->m_webhookCollection = $webhookCollection;
        $this->m_nav = $n;
        $this->m_previewCode = $previewCode;
        $this->m_exception = $exception;
    }

    public function getHTML()
    {

        return
        "<div class='col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1'>
            <div class = 'panel panel-primary'>
                <div class = 'panel-heading'>
                    <h3 class = 'panel-title'>Webhook DATA!</h3>
                </div>
                {$this->ShowExistingErrorMessagesIfExceptionExists()}
            </div>
            <div class = 'panel panel-primary'>
                <div class = 'panel-heading'>
                    <h3 class = 'panel-title'>History of commits to github for this project!</h3>
                </div>
                <div class = 'panel-body'>
                    <div class='container col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1'>
                        <div class='well'>
                            {$this->ExtractWebhook()}
                        </div>
                    </div>
                </div>
            </div>
        </div>";
    }

    private function ExtractWebhook()
    {
        $webhooks = $this->m_webhookCollection->GetWebhooks();
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
        "

        <div class='row'>
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
                    <a href=?{$this->m_nav->RenderGetParam($this->m_nav->getControllerKey(), $this->m_nav->getDownLoadControllerValue())}&{$this->m_nav->RenderGetParam($this->m_nav->GetShaKey(), $w->getCommits()->getId())}
                       class='btn btn-lg btn-warning btn-block'>Build Archive ({$w->getCommits()->getId()})
                    </a>
                    {$this->RenderCommits($w->getCommits(), $this->m_nav, $this->m_previewCode)}
                    {$this->RenderRepository($w->getRepository(), $w->getCommits()->getId())}
                    {$this->RenderSender($w->getSender(), $w->getCommits()->getId())}
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

    private function RenderCommits(\model\Commits $c, \view\Navigation $nav, $previewCode = "")
    {
        $wc = new \view\WebhookCommits($c, $nav, $previewCode);
        $this->m_nav->GetSessionHandler()->AddWebhookCommit($wc);
        return  $wc->getHTML();
    }

    private function RenderRepository(\model\Repository $r, $sha)
    {
        $html   = new \view\WebHookRepository($r, $this->m_nav, $sha);
        return  $html->getHTML();
    }

    private function RenderSender(\model\Sender $s, $sha)
    {
        $html   = new \view\WebHookSender($s, $this->m_nav, $sha);
        return  $html->getHTML();
    }

    private function ShowExistingErrorMessagesIfExceptionExists()
    {
        if($this->m_exception != null)
        {
            return
            "<div class='well'>
                <h3>Error Message ({$this->m_exception->getCode()})</h3>
                <h6 class ='h6'>
                    {$this->m_errorHandler->GetErrorMessageByCode($this->m_exception->getCode())}
                </h6>
            </div>";
        }
        return "";
    }
}