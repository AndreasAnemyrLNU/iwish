<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-10
 * Time: 15:25
 * @author Andreas Anemyr <andreas@anemyr.se>
 */

namespace model;

//TODO Fix type in parmas below!!

class Commits
{
    /**
     * @var
     */
    private $id;
    /**
     * @var
     */
    private $distinct;
    /**
     * @var
     */
    private $message;
    /**
     * @var
     */
    private $timestamp;
    /**
     * @var
     */
    private $url;
    /**
     * @var
     */
    private $author;
    /**
     * @var
     */
    private $committer;
    /**
     * @var
     */
    private $added;
    /**
     * @var
     */
    private $removed;
    /**
     * @var
     */
    private $modified;

    /**
     * commits constructor.
     * @param $id
     * @param $distinct
     * @param $message
     * @param $timestamp
     * @param $url
     * @param $author
     * @param $committer
     * @param $added
     * @param $removed
     * @param $modified
     */
    public function __construct($id, $distinct, $message, $timestamp, $url, $author, $committer, $added, $removed, $modified)
    {
        $this->id           = $id;
        $this->distinct     = $distinct;
        $this->message      = $message;
        $this->timestamp    = $timestamp;
        $this->url          = $url;
        $this->author       = $author;
        $this->committer    = $committer;
        $this->added        = $added;
        $this->removed      = $removed;
        $this->modified     = $modified;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getDistinct()
    {
        return $this->distinct;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return mixed
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return mixed
     */
    public function getCommitter()
    {
        return $this->committer;
    }

    /**
     * @return mixed
     */
    public function getAdded()
    {
        return $this->added;
    }

    /**
     * @return mixed
     */
    public function getRemoved()
    {
        return $this->removed;
    }

    /**
     * @return mixed
     */
    public function getModified()
    {
        return $this->modified;
    }


}
