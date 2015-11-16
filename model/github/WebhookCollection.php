<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-11
 * Time: 21:47
 */

namespace model;


class WebhookCollection
{
    private $webhooks;

    /**
     * WebhookCollection constructor.
     * @param $webhooks
     */
    public function __construct()
    {
        $this->webhooks;
    }

    public function GetWebhooks()
    {
        return $this->webhooks;
    }

    public function addSerializedWebhook(\model\Webhook $webhook)
    {
        $this->webhooks[] = $webhook;
    }
    
    public function GetWebHookByIdOfCommits($id)
    {
        foreach($this->GetWebhooks() as $webhook)
        {
            $w =$this->GetWebhookAsTypeWebhook($webhook);
            if($w->getCommits()->getId() == $id)
                return $w;
        }
        return null;
    }

    public function GetWebhookAsTypeWebhook(\model\Webhook $w)
    {
        return $w;
    }

}