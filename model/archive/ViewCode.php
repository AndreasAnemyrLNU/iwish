<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-15
 * Time: 23:19
 */

namespace model;


class ViewCode
{
    private $webhook;
    private $currentCollection;
    private $file;

    public function __construct(\model\Webhook $w, $currentCollection, $file)
    {
        $this->webhook = $w;
        $this->currentCollection = $currentCollection;
        $this->file = $file;
    }

    public function GetContentInFile()
    {
        //TODO Replace hardcoded string for root with dynamic stuff instead!
        $pathToArchive = $_SERVER['DOCUMENT_ROOT'] . '/1dv608/iwish/data/physicalRepoArchive/';
        $pathToFile = $pathToArchive . $this->webhook->getCommits()->getId() .'/'. $this->currentCollection .'/'. $this->file;

        return file_get_contents($pathToFile);
    }
}