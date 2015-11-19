<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-10
 * Time: 18:21
 * @author Andreas Anemyr <andreas@anemyr.se>
 */

namespace model;


/**
 * Class Removed
 * @package model
 */
class Removed
{
    /**
     * @var
     */
    private $m_removed;

    /**
     * removed constructor.
     * @param $removed
     */
    public function __construct($removed)
    {
        $this->m_removed = $removed;
    }

    /**
     * @return mixed
     */
    public function getRemoved()
    {
        return $this->m_removed;
    }

}