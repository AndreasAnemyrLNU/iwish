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
    //**********************************************************************************
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

    // Start Region :: Evaluate controller
    public function ClientWantsTheDownloadController()
    {
        if($_POST[self::$controllerKey] === self::$indexControllerValue)
            return true;
    }
}