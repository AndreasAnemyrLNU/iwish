<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-10
 * Time: 14:30
 * @author Andreas Anemyr <andreas@anemyr.se>
 */

namespace model;


class Webhook
{
    private $m_ref;
    private $m_before;
    private $m_after;
    private $m_created;
    private $m_deleted;
    private $m_forced;
    private $m_base_ref;
    private $m_compare;
    private $m_commits;
    private $m_headCommit;
    private $m_repository;
    private $m_pusher;
    private $m_sender;

    /**
     * @param $ref
     * @param $before
     * @param $after
     * @param $created
     * @param $deleted
     * @param $forced
     * @param $base_ref
     * @param $compare
     * @param Commits $commits
     * @param HeadCommit $headCommit
     * @param Repository $repository
     * @param Pusher $pusher
     * @param Sender $sender
     */
    public function __construct(
        $ref,
        $before,
        $after,
        $created,
        $deleted,
        $forced,
        $base_ref,
        $compare,
        \model\Commits $commits,
        \model\HeadCommit $headCommit,
        \model\Repository $repository,
        \model\Pusher $pusher,
        \model\Sender $sender
    )
    {
        $this->m_ref = $ref;
        $this->m_before = $before;
        $this->m_after = $after;
        $this->m_created = $created;
        $this->m_deleted = $deleted;
        $this->m_forced = $forced;
        $this->m_base_ref = $base_ref;
        $this->m_compare = $compare;
        $this->m_commits = $commits;
        $this->m_headCommit = $headCommit;
        $this->m_repository = $repository;
        $this->m_pusher = $pusher;
        $this->m_sender = $sender;
    }

    /**
     * @return mixed
     */
    public function getRef()
    {
        return $this->m_ref;
    }

    /**
     * @return mixed
     */
    public function getBefore()
    {
        return $this->m_before;
    }

    /**
     * @return mixed
     */
    public function getAfter()
    {
        return $this->m_after;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->m_created;
    }

    /**
     * @return mixed
     */
    public function getDeleted()
    {
        return $this->m_deleted;
    }

    /**
     * @return mixed
     */
    public function getForced()
    {
        return $this->m_forced;
    }

    /**
     * @return mixed
     */
    public function getBaseRef()
    {
        return $this->m_base_ref;
    }

    /**
     * @return mixed
     */
    public function getCompare()
    {
        return $this->m_compare;
    }

    /**
     * @return Commits
     */
    public function getCommits()
    {
        return $this->m_commits;
    }

    /**
     * @return HeadCommit
     */
    public function getHeadCommit()
    {
        return $this->m_headCommit;
    }

    /**
     * @return Repository
     */
    public function getRepository()
    {
        return $this->m_repository;
    }

    /**
     * @return Pusher
     */
    public function getPusher()
    {
        return $this->m_pusher;
    }

    /**
     * @return Sender
     */
    public function getSender()
    {
        return $this->m_sender;
    }

}

