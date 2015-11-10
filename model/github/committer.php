<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-10
 * Time: 18:19
 */

namespace model;


class committer
{
    private $name;
    private $email;
    private $username;

    /**
     * committer constructor.
     * @param $name
     * @param $email
     * @param $username
     */
    public function __construct($name, $email, $username)
    {
        $this->name = $name;
        $this->email = $email;
        $this->username = $username;
    }
}