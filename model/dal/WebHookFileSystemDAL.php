<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-11
 * Time: 21:56
 */

namespace model;


class webhookFileSystemDAL
{
    public function Read()
    {
        $files = scandir('data/webhook');

        $webHookCollection = new \model\WebhookCollection();

        foreach($files as $file)
        {
            $webHookCollection->addSerializedWebhook(unserialize(file_get_contents('data/webhook/' . $file)));
        }

        return $webHookCollection;
    }
}