<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-13
 * Time: 12:57
 */

namespace model;


class SaveOldVersionInArchive
{
    private static $archiveDir = "data/../../physicalRepoArchive";


    /**
     * @param Modified $m
     * @param $before git version...
     */
    public function SaveFiles()
    {
        //$filenames = $m->getModified();

        //foreach($filenames as $filename)
        //{

        //}

        $this->CreateArchive();

    }

    private function CreateArchive()
    {
        mkdir(self::$archiveDir);
    }

}