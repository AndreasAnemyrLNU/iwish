<?php

/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-17
 * Time: 18:16
 */
class ErrorHandler
{
    const Error100 = 100;
    const Error200 = 200;

    public function GetErrorMessageByCode($errCode)
    {
        if($errCode == self::Error100)
        {
            return "Code can not be previewed for now. Have you build archiv for this commit yet?";
        }
        if($errCode == self::Error200)
        {
            return "Code can not be previewed for now. Have you build archiv for this commit yet?";
        }
        return "";
    }

}