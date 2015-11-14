<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-14
 * Time: 12:43
 */

namespace view;


class Navigation
{
    //**********************************************************************************
    // Key Readonly
    private static $controllerKey = 'c';
    public static function getControllerKey(){return self::$controllerKey;}
    // Value for private $controller to use.
    // I You declare a new controller you should declare it here!
    //**********************************************************************************
    private static $indexControllerValue = 'index';
    public static function getIndexControllerValue(){return self::$indexControllerValue;}
    //**********************************************************************************
    private static $gitControllerValue = 'git';
    public static function getGitControllerValue(){return self::$gitControllerValue;}
    //**********************************************************************************
    private static $downLoadControllerValue = 'download';
    public static function getDownLoadControllerValue(){return self::$downLoadControllerValue;}
    private static  $shaKey = 'sha';
    public static function getShaKey(){return self::$shaKey;}

    // Start Region :: Evaluate controller
    public function ClientWantsTheDownloadController()
    {
        if($this->HasKeyInGET(self::getControllerKey()))
        {
            if
            (
                $this->IsValueForControllerKeyInGETEqualsTheTestValue
                (
                    self::getDownLoadControllerValue()
                )
            )
                return true;
        }
        return false;
    }
    // End Region :: Evaluate controller

    // Start Region :: Render Querystring for key and value for GET Request
    // lite this key=value
    public function RenderParamInQueryString($key, $value)
    {
        return "$key=$value";
    }

    private function HasKeyInGET($key)
    {
        if(isset($_GET[$key]))
            return true;
        return false;
    }

    private function IsValueForControllerKeyInGETEqualsTheTestValue($testValue)
    {
        if($_GET[self::getControllerKey()] === $testValue)
            return true;
        return false;
    }

    public function ReadValueFromKeyInGET($key)
    {
        if($this->HasKeyInGET($key))
            return $_GET[$key];
        return "";
    }

    public function GetWebhookBySha(\model\WebhookCollection $w, $sha)
    {
        $w->GetWebHookByIdOfCommits($sha);
    }
}