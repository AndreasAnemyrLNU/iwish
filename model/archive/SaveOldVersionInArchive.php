<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-13
 * Time: 12:57
 * @author Andreas Anemyr <andreas@anemyr.se>
 */

namespace model;


/**
 * Class SaveOldVersionInArchive
 * @package model
 */
class SaveOldVersionInArchive
{
    /**
     * @var string
     */
    private static $physicalRepoArchive = "/../../data/physicalRepoArchive/";

    /**
     * @param $sha
     */
    public function SaveAllModifiedFilesPhysicallyByCommitVersion($sha)
    {
        // Object in array regarding payloaded JSON from github.
        // If github add more collections this array can be modified for more stuff to download....
        $collections = [ 'Added' , 'Removed', 'Modified'];

        $dal = new webhookFileSystemDAL();
        $webhooksCollection = $dal->Read();

        $webhook = $webhooksCollection->GetWebHookByIdOfCommits($sha);

        foreach($collections as $collection)
        {
            $getCollectionMethodDynamicCreatedInRuntime = 'get' . $collection;

            $files = $webhook->getCommits()->$getCollectionMethodDynamicCreatedInRuntime();
            $this->SaveFiles($files = $files->$getCollectionMethodDynamicCreatedInRuntime(), $sha, strtolower($collection));
        }
    }

    /**
     * @param $sha
     */
    private function CreateArchive($sha)
    {
            if(!(file_exists(__DIR__ .  self::$physicalRepoArchive . $sha)))
                mkdir(__DIR__ .  self::$physicalRepoArchive . $sha, 0777, true);

    }

    /**
     * @param $file
     * @param $raw
     * @param $sha
     */
    private function SaveFile($file, $raw, $sha)
    {
        file_put_contents(__DIR__ . self::$physicalRepoArchive . $sha . '/'. $file, $raw);
    }

    /**
     * @param $file
     * @param $sha
     */
    private function CreateFolderStructure($file, $sha)
    {
        $path = dirname(__DIR__ . self::$physicalRepoArchive . $sha . '/'. $file);
        if (!(file_exists($path)))
            mkdir($path, 0777, true);
    }

    /**
     * @param $files
     * @param $sha
     * @param $dirWhereToPlaceFilesCollection
     */
    private function SaveFiles($files, $sha, $dirWhereToPlaceFilesCollection)
    {
        foreach($files as $file)
        {
            $raw =  file_get_contents("https://raw.githubusercontent.com/AndreasAnemyrLNU/iwish/$sha/$file");
            $this->CreateArchive($sha . "/$dirWhereToPlaceFilesCollection");
            $this->CreateFolderStructure($file, $sha . "/$dirWhereToPlaceFilesCollection");
            $this->SaveFile($file, $raw, $sha . "/$dirWhereToPlaceFilesCollection");
        }
    }
}