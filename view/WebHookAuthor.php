<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-12
 * Time: 14:08
 */

namespace view;


class WebHookAuthor
{
    private $m_author;

    /**
     * WebHookAuthor constructor.
     * @param $m_author
     */
    public function __construct(\model\Author $m_author)
    {
        $this->m_author = $m_author;
        $this->getHTML();
    }

    public function getHTML()
    {
         return
         "
         <div>{$this->m_author->getEmial()}</div>
         <div>{$this->m_author->getName()}</div>
         <div>{$this->m_author->getUsername()}</div>
         ";
    }
}