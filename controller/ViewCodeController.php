<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-15
 * Time: 23:24
 */

namespace controller;


class ViewCodeController
{
    private $m_webhook;
    private $m_nav;

    public function __construct(\model\Webhook $w, \view\Navigation $n)
    {
        $this->m_webhook = $w;
        $this->m_nav = $n;
    }

    public function DoViewCode()
    {
        $viewCode = new \model\ViewCode
        (
            $this->m_webhook,
            $this->m_nav->ReadValueFromKeyInGET($this->m_nav->GetFilesKey()),
            $this->m_nav->ReadValueFromKeyInGET($this->m_nav->GetFileNameKey())
        );

        echo "<pre>" . htmlentities($viewCode->GetContentInFile()) . "</pre>";
    }
}