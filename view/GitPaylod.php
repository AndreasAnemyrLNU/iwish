<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-11
 * Time: 12:18
 */

namespace view;


class GitPayload
{
    /***
     * @archive string Param is "hardcoede att github->setting - webhook...."
     */
    private static $archive = "archive";

    public function DidGithubSendArchiveParamSetToTrue()
    {
        if(isset($_POST[self::$archive])) {
            if($_POST[self::$archive] == true)
                return true;
        }
        else {
            return false;
        }
    }
}