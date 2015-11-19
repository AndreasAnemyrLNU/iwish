<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-11
 * Time: 21:47
 * @author Andreas Anemyr <andreas@anemyr.se>
 */

namespace model;


/**
 * Class WebhookCollection
 * @package model
 */
class WebhookCollection
{
    /**
     * @var
     */
    private $webhooks;

    /**
     * WebhookCollection constructor.
     * @param $webhooks
     */
    public function __construct()
    {
        $this->webhooks;
    }

    /**
     * @return mixed
     */
    public function GetWebhooks()
    {
        return $this->webhooks;
    }

    /**
     * @param Webhook $webhook
     */
    public function addSerializedWebhook(\model\Webhook $webhook)
    {
        $this->webhooks[] = $webhook;
    }

    /**
     * @param $id
     * @return Webhook|null
     */
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

    /**
     * @param Webhook $w
     * @return Webhook
     */
    public function GetWebhookAsTypeWebhook(\model\Webhook $w)
    {
        return $w;
    }

}