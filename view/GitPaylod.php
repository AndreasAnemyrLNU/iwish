<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-11
 * Time: 12:18
 * @author Andreas Anemyr <andreas@anemyr.se>
 */

namespace view;


/**
 * Class GitPayload
 * @package view
 */
class GitPayload
{
    /***
     * @archive string Param is "hardcoede att github->setting - webhook...."
     */
    private static $archive = "archive";

    /**
     * @var string
     */
    private static $payload = "payload";

    /**
     * @return bool
     */
    public function DidGithubSendArchiveParamSetToTrue()
    {
        if(isset($_POST[self::$archive])) {
            if($_POST[self::$archive] == true)
                return true;
        }
            return false;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function GetPayLoad()
    {
        if(isset($_POST[self::$payload]))
        {
            return $_POST[self::$payload];

        }
        else
        {
            throw new \Exception('No data in $_POST[self::$payload]');
        }
    }
}