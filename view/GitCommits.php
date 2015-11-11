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

    /**
     * GitCommits constructor.
     */
    public function __construct(\model\WebhookCollection $webhookCollection)
    {
        $this->webhookCollection = $webhookCollection;
    }

    public function getHTML()
    {
        foreach($this->webhookCollection as $webhook)
        {
            echo $webhook;
        }
    }

}