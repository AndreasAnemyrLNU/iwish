<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-15
 * Time: 14:47
 * @author Andreas Anemyr <andreas@anemyr.se>
 */

namespace controller;


class RepublishController
{
    /**
     * @var \model\Webhook
     */
    private $m_webhook;

    /**
     * @var \view\Navigation
     */
    private $m_nav;

    /**
     * @param \model\Webhook $w
     * @param \view\Navigation $n
     */
    public function __construct(\model\Webhook $w, \view\Navigation $n)
    {
        $this->m_webhook = $w;
        $this->m_nav = $n;
    }

    public function DoRepublish()
    {
        new \model\ViewCode
        (
            $this->m_webhook,
            $this->m_nav->ReadValueFromKeyInGET($this->m_nav->GetFilesKey()),
            $this->m_nav->ReadValueFromKeyInGET($this->m_nav->GetFileNameKey())
        );
    }
}