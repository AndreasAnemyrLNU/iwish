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
    private $m_name;
    private $m_emial;
    private $m_username;

    /**
     * author constructor.
     * @param $name
     * @param $emial
     * @param $username
     */
    public function __construct($name, $emial, $username)
    {
        $this->m_name = $name;
        $this->m_emial = $emial;
        $this->m_username = $username;
    }


}