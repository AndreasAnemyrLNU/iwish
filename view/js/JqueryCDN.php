<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-12
 * Time: 09:18
 * @author Andreas Anemyr <andreas@anemyr.se>
 */

namespace view;


/**
 * Class JqueryCDN
 * @package view
 */
class JqueryCDN
{
    public function getJavascript()
    {
        return
            "<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js\"></script>";
    }
}