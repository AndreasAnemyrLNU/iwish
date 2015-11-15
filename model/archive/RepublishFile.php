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

    private static $physicalRepoArchive = "/../../data/physicalRepoArchive/";

    private $webhook;
    private $currentCollection;
    private $file;

    public function __construct(\model\Webhook $w, $currentCollection, $file)
    {
        $this->webhook = $w;
        $this->currentCollection = $currentCollection;
        $this->file;
        $this->RepublishFile();
    }

    public function RepublishFile()
    {
        $raw = file_get_contents(self::$physicalRepoArchive . $this->currentCollection . $this->file);

        echo $raw;

    }

}