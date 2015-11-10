<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-10
 * Time: 15:25
 */

namespace model;


class Commits
{
    private $id;
    private $distinct;
    private $message;
    private $timestamp;
    private $url;
    private $author;
    private $committer;
    private $added;
    private $removed;
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
}