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
         <div class='panel panel-body'>
             <h4 class='h4'>Author</h4>
             <dl class='dl-horizontal'>
                <dt>Email: </dt>
                <dd>{$this->m_author->getEmial()}</dd>
                <dt>Name: </dt>
                <dd>{$this->m_author->getName()}</dd>
                <dt>Username: </dt>
                <dd>{$this->m_author->getUsername()}</dd>
             </dl>
         </div>
         ";
    }
}