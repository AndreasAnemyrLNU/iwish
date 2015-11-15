<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-14
 * Time: 15:47
 */

namespace controller;


class DownloadController
{
    private $nav;

    public function __construct(\view\Navigation $n)
    {
        $this->nav = $n;
    }

    public function DoDownload()
    {
        $saver = new \model\SaveOldVersionInArchive();
        $saver->SaveAllModifiedFilesPhysicallyByCommitVersion($this->nav->ReadValueFromKeyInGET($this->nav->getShaKey()));
    }
}

