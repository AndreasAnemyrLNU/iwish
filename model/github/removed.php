<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-10
 * Time: 18:21
 */

namespace model;


class Removed
{
    private $rem;

    /**
     * removed constructor.
     * @param $removed
     */
    public function __construct($removed)
    {
        $this->rem = $removed;
    }
}