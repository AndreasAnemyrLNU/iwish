<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-10
 * Time: 14:30
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
    private $m_clone_url;

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
        $headCommit,
        $repository,
        \model\Pusher $pusher,
        \model\Sender $sender,
        $clone_url
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

        $this->m_clone_url = $clone_url;
    }

}

