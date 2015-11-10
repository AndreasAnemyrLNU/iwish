<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-10
 * Time: 17:57
 */

namespace model;


class Author
{
    private $name;
    private $emial;
    private $username;

    /**
     * author constructor.
     * @param $name
     * @param $emial
     * @param $username
     */
    public function __construct($name, $emial, $username)
    {
        $this->name = $name;
        $this->emial = $emial;
        $this->username = $username;
    }


}