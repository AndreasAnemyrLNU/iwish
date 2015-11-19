<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr...
 * Date: 2015-11-10
 * Time: 17:57
 * @author Andreas Anemyr <andreas@anemyr.se>
 */
namespace model;
class Author
{
    /**
     * @var
     */
    private $m_name;

    /**
     * @var
     */
    private $m_emial;

    /**
     * @var
     */
    private $m_username;

    /**
     * author constructor...
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

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->m_name;
    }

    /**
     * @return mixed
     */
    public function getEmial()
    {
        return $this->m_emial;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->m_username;
    }
}