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
    private static $physicalRepoArchive = "/../../data/physicalRepoArchive/";


    /**
     * @param Modified $m
     * @param $before git version...
     */
    public function SaveAllModifiedFilesPhysicallyByCommitVersion($sha)
    {
        $dal = new webhookFileSystemDAL();
        $webhooksCollection = $dal->Read();

        $webhook = $webhooksCollection->GetWebHookByIdOfCommits($sha);

        $added = $webhook->getCommits()->getAdded();
        $filesAdded = $added->getAdded();

        foreach($filesAdded as $file)
        {
            $raw =  file_get_contents("https://raw.githubusercontent.com/AndreasAnemyrLNU/iwish/$sha/$file");
            $this->CreateArchive($sha);
            $this->CreateFolderStructure($file, $sha);
            $this->SaveFile($file, $raw, $sha);
        }
    }

    private function CreateArchive($sha)
    {
            if(!(file_exists(__DIR__ .  self::$physicalRepoArchive . $sha)))
                mkdir(__DIR__ .  self::$physicalRepoArchive . $sha);

    }

    private function SaveFile($file, $raw, $sha)
    {
        file_put_contents(__DIR__ . self::$physicalRepoArchive . $sha . '/'. $file, $raw);
    }

    private function CreateFolderStructure($file, $sha)
    {
        $path = dirname(__DIR__ . self::$physicalRepoArchive . $sha . '/'. $file);
        if (!(file_exists($path)))
            mkdir($path);
    }
}