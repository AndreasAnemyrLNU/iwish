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
    private $m_sessionhandler;
    public function GetSessionHandler(){return $this->m_sessionhandler;}

    public function __construct(\model\SessionHandler $sh)
    {
        $this->m_sessionhandler = $sh;
    }

    //**********************************************************************************
    // Key Readonly
    private static $controllerKey = 'c';
    public function getControllerKey(){return self::$controllerKey;}
    // Value for private $controller to use.
    // I You declare a new controller you should declare it here!
    //**********************************************************************************
    private static $indexControllerValue = 'index';
    public function getIndexControllerValue(){return self::$indexControllerValue;}
    //**********************************************************************************
    private static $gitControllerValue = 'git';
    public function getGitControllerValue(){return self::$gitControllerValue;}
    //**********************************************************************************
    private static $republishControllerValue = 'republish';
    public function GetRepublishControllerValue(){return self::$republishControllerValue;}
    //**********************************************************************************
    private static $viewCodeControllerValue = 'viewCode';
    public function GetViewCodeControllerValue(){return self::$viewCodeControllerValue;}
    //**********************************************************************************
    private static $deleteControllerValue = 'delete';
    public function GetDeleteControllerValue(){return self::$deleteControllerValue;}
    //**********************************************************************************
    private static $downLoadControllerValue = 'download';
    public function getDownLoadControllerValue(){return self::$downLoadControllerValue;}
    private static  $shaKey = 'sha';
    public function GetShaKey(){return self::$shaKey;}
    //**********************************************************************************
    private static $filesKey = 'f';
    public function GetFilesKey(){return self::$filesKey;}
    private static $filesAddedValue = 'added';
    public function GetFilesAddedValue(){return self::$filesAddedValue;}
    private static $filesModifiedValue = 'modified';
    public function GetFilesModifiedValue(){return self::$filesModifiedValue;}
    private static $filesRemovedValue = 'removed';
    public function GetFilesRemovedValue(){return self::$filesRemovedValue;}
    private static $fileNameKey = 'fn';
    public function GetFileNameKey(){return self::$fileNameKey;}
    //**********************************************************************************
    private static $visibleStatusKey = 'visibleStatusKey';
    public function GetVisibleStatusKey(){return self::$visibleStatusKey;}
    private static $visibleStatusValueTrue = true;
    public function GetVisibleStatusValueAsTrue(){return self::$visibleStatusValueTrue;}
    private static $visibleStatusValueFalse = false;
    public function GetVisibleStatusValueAsFalse(){return self::$visibleStatusValueFalse;}
    public function ToggleVisibleStatus($visibleSatus, $asString)
    {
        assert  (
                    is_bool($visibleSatus) || is_null($visibleSatus),
                    'Param should be as bool format or null!'
                );
        assert
                (
                    is_bool($asString),'Param $asString should be as bool format!'
                );

        if($visibleSatus === true)
        {
            return var_export($this->GetVisibleStatusValueAsFalse(), $asString);
        }
        else
        {
            return var_export($this->GetVisibleStatusValueAsTrue(), $asString);
        }
    }
    public static $formIdKey = 'formIdKey';
    public function GetFormIdKey() {return self::$formIdKey;}
    ///**********************************************************************************

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
    public function RenderGetParam($key, $value)
    {
        return "$key=$value";
    }

    private function HasKeyInGET($key)
    {
        if(isset($_GET[$key]))
            return true;
        return false;
    }

    private function HasKeyInPOST($key)
    {
        if(isset($_POST[$key]))
            return true;
        return false;
    }

    private function HasKeyInCOOKIE($key)
    {
        if(isset($_COOKIE[$key]))
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

    public function ReadValueFromKeyInCOOKIE($key)
    {
        if($this->HasKeyInCOOKIE($key))
            return $_COOKIE[$key];
        return "";
    }

    public function ReadValueFromKeyInPOST($key)
    {
        if($this->HasKeyInPOST($key))
            return $_POST[$key];
        return "";
    }

    public function GetWebhookBySha(\model\WebhookCollection $w)
    {
        return $w->GetWebHookByIdOfCommits($this->ReadValueFromKeyInGET($this->GetShaKey()));
    }

    public function ClientWantsToViewCode()
    {
        if($this->IsValueForControllerKeyInGETEqualsTheTestValue($this->GetViewCodeControllerValue()))
            return true;
        return false;
    }

    public function ClientWantsToRepublish()
    {
        if($this->IsValueForControllerKeyInGETEqualsTheTestValue($this->GetRepublishControllerValue()))
            return true;
        return false;
    }

    public function ClientWantsToDelete()
    {
        if($this->IsValueForControllerKeyInGETEqualsTheTestValue($this->GetDeleteControllerValue()))
            return true;
        return false;
    }

    //Cookies
    public function SetCookie($key, $value)
    {
        setcookie($key, $value, time()+(60*60*24));
    }

    public function UnsetCookie($key)
    {
        setcookie($key, '', time()-(3600));
    }

    public function RenderFormThatCanToggleVisibility($buttonName, $visible, $sha, $formId)
    {
        return
        "
        <form method='post' class='form-horizontal' role='form'>
            <div class='form-group'>
                <input  type='hidden'
                        name='{$this->GetVisibleStatusKey()}'
                        value='{$this->ToggleVisibleStatus($visible, true)}'>
                <input  type='hidden'
                        name='{$this->GetShaKey()}'
                        value='{$sha}'>
                <input  type='hidden'
                        name='{$this->GetFormIdKey()}'
                        value='{$formId}'>
            </div>
            <div class='form-group'>
                <button type='submit' class='btn btn-block btn-info'>{$buttonName}</button>
            </div>
        </form>
        ";
    }

    public function ClientTogglesVisibility()
    {
        if($this->ReadValueFromKeyInPOST(self::$visibleStatusKey) == true)
        {

                var_dump($_POST);

                if($this->ReadValueFromKeyInCOOKIE($this->ReadValueFromKeyInPOST(self::$formIdKey)) == 0)
                {
                    $this->SetCookie($this->ReadValueFromKeyInPOST(self::$formIdKey),1);
                }
                else
                {
                    $this->UnsetCookie($this->ReadValueFromKeyInPOST(self::$formIdKey));
                }
                return true;
        }
        return false;
    }
}