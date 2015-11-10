<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-10
 * Time: 11:26
 */

namespace controller;


class indexController
{
    public function doIndex()
    {
        file_put_contents(test.data, $_POST['payload']);
    }
}