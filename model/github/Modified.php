<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-10
 * Time: 18:22
 */

namespace model;


class Modified
{
    private $m_modified;

    /**
     * modified constructor.
     * @param $modified
     */
    public function __construct($modified)
    {
        $this->m_modified = $modified;
    }

    /**
     * @return mixed
     */
    public function getModified()
    {
        return $this->m_modified;
    }

}