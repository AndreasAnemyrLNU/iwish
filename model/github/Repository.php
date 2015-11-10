<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-10
 * Time: 21:14
 */

namespace model;


class Repository
{
    private $id;
    private $name;
    private $full_name;
    private $owner;

    /**
     * Repository constructor.
     * @param $id
     * @param $name
     * @param $full_name
     * @param $owner
     */
    public function __construct($id, $name, $full_name, \model\owner $owner)
    {
        $this->id = $id;
        $this->name = $name;
        $this->full_name = $full_name;
        $this->owner = $owner;
    }


}