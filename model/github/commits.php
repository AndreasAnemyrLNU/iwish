<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-10
 * Time: 15:25
 */

namespace model;


class commits
{
    private $id;
    private $distinct;
    private $message;
    private $timestamp;
    private $url;
    private $author;

    /**
     * commits constructor.
     * @param $id
     * @param $distinct
     * @param $message
     * @param $timestamp
     * @param $url
     * @param $author
     */

    public function __construct($id, $distinct, $message, $timestamp, $url, $author)
    {
        $this->id = $id;
        $this->distinct = $distinct;
        $this->message = $message;
        $this->timestamp = $timestamp;
        $this->url = $url;
        $this->author = $author;
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


}