<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-11
 * Time: 01:22
 */

namespace model;


class Sender
{
    private $login;
    private $id;
    private $avatar_url;
    private $gravatar_id;
    private $url;
    private $html_urlprivate;
    private $followers_url;
    private $following_url;
    private $gists_url;
    private $starred_url;
    private $subscriptions_url;
    private $organizations_url;
    private $repos_url;
    private $events_url;
    private $received_events_url;
    private $type;
    private $site_admin;

    /**
     * Sender constructor.
     * @param $sender
     * @param $login
     * @param $id
     * @param $avatar_url
     * @param $gravatar_id
     * @param $url
     * @param $html_urlprivate
     * @param $followers_url
     * @param $following_url
     * @param $gists_url
     * $param $starred_url
     * @param $gists_url;
     * @param $starred_url;
     * @param $subscriptions_url;
     * @param $organizations_url;
     * @param $repos_url;
     * @param $events_url;
     * @param $received_events_url;
     * @param $type;
     * @param $site_admin;
     */

    public function __construct
    (
        $login,
        $id,
        $avatar_url,
        $gravatar_id,
        $url,
        $html_urlprivate,
        $followers_url,
        $following_url,
        $gists_url,
        $starred_url,
        $subscriptions_url,
        $organizations_url,
        $repos_url,
        $events_url,
        $received_events_url,
        $type,
        $site_admin
    )
    {
        $this->login = $login;
        $this->id = $id;
        $this->avatar_url = $avatar_url;
        $this->gravatar_id = $gravatar_id;
        $this->url = $url;
        $this->html_urlprivate = $html_url;
        $this->followers_url = $followers_url;
        $this->following_url = $following_url;
        $this->gists_url = $gists_url;
        $this->starred_url = $starred_url;
        $this->subscriptions_url = $subscriptions_url;
        $this->organizations_url = $organizations_url;
        $this->repos_url = $repos_url;
        $this->events_url = $events_url;
        $this->received_events_url = $received_events_url;
        $this->type = $type;
        $this->site_admin = $site_admin;
    }
}