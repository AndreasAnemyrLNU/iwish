<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-14
 * Time: 12:43
 * @author Andreas Anemyr <andreas@anemyr.se>
 */

namespace view;


/**
 * Class Navigation
 * @package view
 */
class Navigation
{
    /**
     * @var \model\SessionHandler
     */
    private $m_sessionhandler;

    /**
     * @return \model\SessionHandler
     */
    public function GetSessionHandler(){return $this->m_sessionhandler;}

    /**
     * @param \model\SessionHandler $sh
     */
    public function __construct(\model\SessionHandler $sh)
    {
        $this->m_sessionhandler = $sh;
    }

    //**********************************************************************************
    // Key Readonly
    /**
     * @var string
     */
    private static $controllerKey = 'c';

    /**
     * @return string
     */
    public function getControllerKey(){return self::$controllerKey;}
    // Value for private $controller to use.
    // I You declare a new controller you should declare it here!
    //**********************************************************************************
    /**
     * @var string
     */
    private static $indexControllerValue = 'index';

    /**
     * @return string
     */
    public function getIndexControllerValue(){return self::$indexControllerValue;}
    //**********************************************************************************
    /**
     * @var string
     */
    private static $gitControllerValue = 'git';

    /**
     * @return string
     */
    public function getGitControllerValue(){return self::$gitControllerValue;}
    //**********************************************************************************
    /**
     * @var string
     */
    private static $republishControllerValue = 'republish';

    /**
     * @return string
     */
    public function GetRepublishControllerValue(){return self::$republishControllerValue;}
    //**********************************************************************************
    /**
     * @var string
     */
    private static $viewCodeControllerValue = 'viewCode';

    /**
     * @return string
     */
    public function GetViewCodeControllerValue(){return self::$viewCodeControllerValue;}
    //**********************************************************************************
    private static $deleteControllerValue = 'delete';

    /**
     * @return string
     */
    public function GetDeleteControllerValue(){return self::$deleteControllerValue;}
    //**********************************************************************************
    /**
     * @var string
     */
    private static $downLoadControllerValue = 'download';

    /**
     * @return string
     */
    public function getDownLoadControllerValue(){return self::$downLoadControllerValue;}

    /**
     * @var string
     */
    private static  $shaKey = 'sha';

    /**
     * @return string
     */
    public function GetShaKey(){return self::$shaKey;}
    //**********************************************************************************
    private static $filesKey = 'f';

    /**
     * @return string
     */
    public function GetFilesKey(){return self::$filesKey;}

    /**
     * @var string
     */
    private static $filesAddedValue = 'added';

    /**
     * @return string
     */
    public function GetFilesAddedValue(){return self::$filesAddedValue;}

    /**
     * @var string
     */
    private static $filesModifiedValue = 'modified';

    /**
     * @return string
     */
    public function GetFilesModifiedValue(){return self::$filesModifiedValue;}

    /**
     * @var string
     */
    private static $filesRemovedValue = 'removed';

    /**
     * @return string
     */
    public function GetFilesRemovedValue(){return self::$filesRemovedValue;}

    /**
     * @var string
     */
    private static $fileNameKey = 'fn';

    /**
     * @return string
     */
    public function GetFileNameKey(){return self::$fileNameKey;}
    //**********************************************************************************
    private static $visibleStatusKey = 'visibleStatusKey';

    /**
     * @return string
     */
    public function GetVisibleStatusKey(){return self::$visibleStatusKey;}

    /**
     * @var bool
     */
    private static $visibleStatusValueTrue = true;

    /**
     * @return bool
     */
    public function GetVisibleStatusValueAsTrue(){return self::$visibleStatusValueTrue;}

    /**
     * @var bool
     */
    private static $visibleStatusValueFalse = false;

    /**
     * @return bool
     */
    public function GetVisibleStatusValueAsFalse(){return self::$visibleStatusValueFalse;}

    /**
     * @param $visibleSatus
     * @param $asString
     * @return mixed
     */
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

    /**
     * @var string
     */
    public static $formIdKey = 'formIdKey';

    /**
     * @return string
     */
    public function GetFormIdKey() {return self::$formIdKey;}
    ///**********************************************************************************

    // Start Region :: Evaluate controller
    /**
     * @return bool
     */
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
    /**
     * @param $key
     * @param $value
     * @return string
     */
    public function RenderGetParam($key, $value)
    {
        return "$key=$value";
    }

    /**
     * @param $key
     * @return bool
     */
    private function HasKeyInGET($key)
    {
        if(isset($_GET[$key]))
            return true;
        return false;
    }


    /**
     * @param $key
     * @return bool
     */
    private function HasKeyInPOST($key)
    {
        if(isset($_POST[$key]))
            return true;
        return false;
    }

    /**
     * @param $key
     * @return bool
     */
    private function HasKeyInCOOKIE($key)
    {
        if(isset($_COOKIE[$key]))
            return true;
        return false;
    }

    /**
     * @param $testValue
     * @return bool
     */
    private function IsValueForControllerKeyInGETEqualsTheTestValue($testValue)
    {
        if($_GET[self::getControllerKey()] === $testValue)
            return true;
        return false;
    }

    /**
     * @param $key
     * @return string
     */
    public function ReadValueFromKeyInGET($key)
    {
        if($this->HasKeyInGET($key))
            return $_GET[$key];
        return "";
    }

    /**
     * @param $key
     * @return string
     */
    public function ReadValueFromKeyInCOOKIE($key)
    {
        if($this->HasKeyInCOOKIE($key))
            return $_COOKIE[$key];
        return "";
    }

    /**
     * @param $key
     * @return string
     */
    public function ReadValueFromKeyInPOST($key)
    {
        if($this->HasKeyInPOST($key))
            return $_POST[$key];
        return "";
    }

    /**
     * @param \model\WebhookCollection $w
     * @return \model\Webhook|null
     */
    public function GetWebhookBySha(\model\WebhookCollection $w)
    {
        return $w->GetWebHookByIdOfCommits($this->ReadValueFromKeyInGET($this->GetShaKey()));
    }

    /**
     * @return bool
     */
    public function ClientWantsToViewCode()
    {
        if($this->IsValueForControllerKeyInGETEqualsTheTestValue($this->GetViewCodeControllerValue()))
            return true;
        return false;
    }

    /**
     * @return bool
     */
    public function ClientWantsToRepublish()
    {
        if($this->IsValueForControllerKeyInGETEqualsTheTestValue($this->GetRepublishControllerValue()))
            return true;
        return false;
    }

    /**
     * @return bool
     */
    public function ClientWantsToDelete()
    {
        if($this->IsValueForControllerKeyInGETEqualsTheTestValue($this->GetDeleteControllerValue()))
            return true;
        return false;
    }

    //Cookies
    /**
     * @param $key
     * @param $value
     */
    public function SetCookie($key, $value)
    {
        setcookie($key, $value, time()+(60*60*24));
        // Show it now. Directly. That's a hack. A nice hack! :)
        $_COOKIE[$key] = $value;
    }

    /**
     * @param $key
     */
    public function UnsetCookie($key)
    {
        setcookie($key, '', time()-(3600));
        // Show it now. Directly. That's a hack. A nice hack! :)
        $_COOKIE[$key] = 0;
    }

    /**
     * @param $buttonName
     * @param $visible
     * @param $sha
     * @param $formId
     * @return string
     */
    public function RenderFormThatCanToggleVisibility($buttonName, $visible, $sha, $formId)
    {
        return
        "
        <form action='#$formId' id='$formId' class='form-horizontal' method='post' name='$formId' role='form'>
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

    /**
     * @return bool
     */
    public function ClientTogglesVisibility()
    {
        if($this->ReadValueFromKeyInPOST(self::$visibleStatusKey) == true)
        {
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


    /**
     * @param $formId
     * @return bool
     */
    public function IsVisibilityTrueOrFalse($formId)
    {
        if($this->ReadValueFromKeyInCOOKIE($formId) == true)
            return true;
    }

}