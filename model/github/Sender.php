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
    private $sender;
    private $login;
    private $id;
    private $avatar_url;
    private $gravatar_id;
    private $url;
    private $html_urlprivate;
    private $followers_url;
    private $following_url;

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
     */
    public function __construct($login, $id, $avatar_url, $gravatar_id, $url, $html_urlprivate, $followers_url, $following_url)
    {
        $this->login = $login;
        $this->id = $id;
        $this->avatar_url = $avatar_url;
        $this->gravatar_id = $gravatar_id;
        $this->url = $url;
        $this->html_urlprivate = $html_urlp;
        $this->followers_url = $followers_url;
        $this->following_url = $following_url;
    }
}