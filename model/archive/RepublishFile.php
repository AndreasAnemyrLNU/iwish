<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-15
 * Time: 11:48
 */

namespace model;


class RepublishFile
{
    private $webhook;
    private $currentCollection;
    private $file;

    public function __construct(\model\Webhook $w, $currentCollection, $file)
    {
        $this->webhook = $w;
        $this->currentCollection = $currentCollection;
        $this->file = $file;
        $this->RepublishFile();
    }

    public function RepublishFile()
    {
        //TODO Replace hardcoded string for root with dynamic stuff instead!
        $applicationRoot = $_SERVER['DOCUMENT_ROOT'] . '/1dv608/iwish/';
        $pathToArchive = $_SERVER['DOCUMENT_ROOT'] . '/1dv608/iwish/data/physicalRepoArchive/';
        $pathToFile = $pathToArchive . $this->webhook->getCommits()->getId() .'/'. $this->currentCollection .'/'. $this->file;

        $raw = file_get_contents($pathToFile);

        $datetoday = date("Ymd");
        $raw.= "\n//Republished by Iwish $datetoday";

        file_put_contents($applicationRoot . $this->file, $raw);
    }
}