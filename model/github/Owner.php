<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-10
 * Time: 21:17
 * @author Andreas Anemyr <andreas@anemyr.se>
 */

namespace model;


/**
 * Class Owner
 * @package model
 */
class Owner
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
     * Owner constructor.
     * @param $name
     * @param $email
     */
    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }
}