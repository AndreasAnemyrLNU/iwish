<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-10
 * Time: 18:21
 */

namespace model;


class Added
{
    private $m_added;

    /**
     * added constructor..
     * @param $added
     */
    public function __construct($added)
    {
        $this->m_added = $added;
    }

    /**
     * @return mixed
     */
    public function getAdded()
    {
        return $this->m_added;
    }

}