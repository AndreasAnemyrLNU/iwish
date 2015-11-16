<?php

namespace model;

/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-16
 * Time: 09:13
 */
class SessionHandler
{
    private $m_visibleContents;

    // Reload status for registred contents to be shown in interface....
    public function __construct()
    {
        $this->m_contents = $_SESSION['visibleContents'];
    }

    public function AddContentToShow($nameOfContent)
    {
        $this->m_contents[] = $nameOfContent;
        $_SESSION['visibleContents'] = $this->m_contents;
    }

    public function GetVisibleContents()
    {
        return $this->m_contents;
    }
}