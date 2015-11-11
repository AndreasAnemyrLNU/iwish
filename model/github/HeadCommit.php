<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-11
 * Time: 10:46
 */

namespace model;


class HeadCommit
{
    private $m_id;
    private $m_distinct;
    private $m_message;
    private $m_timestamp;
    private $m_url;
    private $m_author;
    private $m_committer;
    private $m_added;
    private $m_removed;
    private $m_modified;

    /**
     * HeadCommit constructor.
     * @param $m_id
     * @param $m_distinct
     * @param $m_message
     * @param $m_timestamp
     * @param $m_url
     * @param $m_author
     * @param $m_committer
     * @param $m_added
     * @param $m_removed
     * @param $m_modified
     */
    public function __construct(
        $m_id, $m_distinct,
        $m_message,
        $m_timestamp,
        $m_url,
        $m_author,
        $m_committer,
        $m_added,
        $m_removed,
        $m_modified
    )
    {
        $this->m_id = $m_id;
        $this->m_distinct = $m_distinct;
        $this->m_message = $m_message;
        $this->m_timestamp = $m_timestamp;
        $this->m_url = $m_url;
        $this->m_author = $m_author;
        $this->m_committer = $m_committer;
        $this->m_added = $m_added;
        $this->m_removed = $m_removed;
        $this->m_modified = $m_modified;
    }
}