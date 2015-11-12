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
        $webhooks = $this->webhookCollection->getWebhooks();
        $ret = "";
        foreach($webhooks as $webhook)
        {
            $ret .= $this->RenderWebHook($webhook);
        }
        return $ret;

    }

    private function RenderWebHook(\model\Webhook $webhook)
    {
        $ret  = "<div class='panel panel-body'>";
        $ret .= '<p>' . $webhook->getAfter() . '<p>';
        $ret .= '</div>';

        return $ret;
    }
}