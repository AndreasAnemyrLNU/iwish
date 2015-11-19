<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-11
 * Time: 01:04
 * @author Andreas Anemyr <andreas@anemyr.se>
 */

namespace model;


/**
 * Class Pusher
 * @package model
 */
class Pusher
{
    /**
     * @var
     */
    private $name;
    /**
     * @var
     */
    private $email;

    /**
     * Pusher constructor.
     * @param $name
     * @param $email
     */
    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }
}