<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-15
 * Time: 23:19
 * @author Andreas Anemyr <andreas@anemyr.se>
 */

namespace model;


/**
 * Class ViewCode
 * @package model
 */
class ViewCode
{
    /**
     * @var Webhook
     */
    private $webhook;

    /**
     * @var
     */
    private $currentCollection;

    /**
     * @var
     */
    private $file;

    /**
     * @param Webhook $w
     * @param $currentCollection
     * @param $file
     */
    public function __construct(\model\Webhook $w, $currentCollection, $file)
    {
        $this->webhook = $w;
        $this->currentCollection = $currentCollection;
        $this->file = $file;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function GetContentInFile()
    {
        //TODO Replace hardcoded string for root with dynamic stuff instead!
        $pathToArchive = $_SERVER['DOCUMENT_ROOT'] . '/1dv608/iwish/data/physicalRepoArchive/';
        $pathToFile = $pathToArchive . $this->webhook->getCommits()->getId() .'/'. $this->currentCollection .'/'. $this->file;

        //TODO Urrrggggh fix this later ;)
        $content =  @file_get_contents($pathToFile);

        if($content == "" || $content == null)
            throw new \Exception('',100);

        return $content;
    }
}