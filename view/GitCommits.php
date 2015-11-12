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

        $ret =  "<table class='table table-striped'>";
        $ret.=  "<tr>
                    <th>After</th>
                    <th>Before</th>
                    <th>Id</th>
                </tr>";
        foreach($webhooks as $webhook)
        {
            $ret .= "<tr>{$this->RenderWebHook($webhook)}</tr>";
        }
        $ret .= "</table>";



        return $ret;

    }

    private function RenderWebHook(\model\Webhook $webhook)
    {
        $w = $webhook;
        return "<td>{$w->getAfter()}</td>
                <td>{$w->getBefore()}</td>
                <td>{$this->GetRepositoryData($w->getRepository())->getId()}</td>";
    }

    private function GetRepositoryData(\model\Repository $repository)
    {
        return $repository;
    }
}