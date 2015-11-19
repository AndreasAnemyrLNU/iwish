<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-11
 * Time: 21:56
 * @author Andreas Anemyr <andreas@anemyr.se>
 */

namespace model;


/**
 * Class webhookFileSystemDAL
 * @package model
 */
class webhookFileSystemDAL
{
    /**
     * @return WebhookCollection
     */
    public function Read()
    {
        $files = scandir('data/webhook');

        $webHookCollection = new \model\WebhookCollection();

        foreach($files as $file)
        {
            if($this->IgnoreThedDotAndTheDotDot($file))
            {
                $webhook = unserialize(file_get_contents('data/webhook/' . $file));
                $webHookCollection->addSerializedWebhook($webhook);    
            }
        }
        return $webHookCollection;
    }

    /**
     * @param $file
     * @return bool
     */
    public function IgnoreThedDotAndTheDotDot($file)
    {
        if($file === '.' || $file === '..')
            return false;
        return true;
    }
}