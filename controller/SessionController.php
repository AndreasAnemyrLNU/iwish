<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-16
 * Time: 09:15
 */

namespace controller;


class SessionController
{
    private $m_sessionHandler;
    private $m_nav;

    public function __construct(\view\Navigation $n)
    {
        $this->m_sessionHandler = new \model\SessionHandler();
        $this->m_nav = $n;
        $this->DoSession();
    }

    public function DoSession()
    {
        if($this->m_nav->DidClientChangeVisibleStatusForContent())
            echo $this->m_nav->ContentToChangeVisibilityFor();
    }
}