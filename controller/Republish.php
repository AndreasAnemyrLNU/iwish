<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-15
 * Time: 14:47
 */

namespace controller;


class Republish
{
    private $m_webhook;
    private $m_nav;

    public function __construct(\model\Webhook $w, \view\Navigation $n)
    {
        $this->m_webhook = $w;
        $this->m_nav = $n;
    }
}