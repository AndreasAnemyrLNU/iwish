<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-14
 * Time: 15:47
 * @author Andreas Anemyr <andreas@anemyr.se>
 */

namespace controller;

/**
 * Class DownloadController
 * @package controller
 * @description Pass informatio from view to model if client want to download stuff
 */
class DownloadController
{
    //@var \view\Navigation  Holds the default navigaion
    private $nav;

    /**
     * @param \view\Navigation $n
     */
    public function __construct(\view\Navigation $n)
    {
        $this->nav = $n;
    }

    /**
     * @method DoDownload() creates a model and also download.
     */
    public function DoDownload()
    {
        $saver = new \model\SaveOldVersionInArchive();
        $saver->SaveAllModifiedFilesPhysicallyByCommitVersion($this->nav->ReadValueFromKeyInGET($this->nav->GetShaKey()));
    }


}

