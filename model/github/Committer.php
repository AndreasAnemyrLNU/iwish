<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-10
 * Time: 18:19
 * @author Andreas Anemyr <andreas@anemyr.se>
 */

namespace model;


class Committer
{
    /**
     * @var
     */
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

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

}