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
    private $m_visible;
    private $m_author;
    private $m_nav;
    private $m_sha;
    private $m_formId;

    public function __construct(\model\Author $a, \view\Navigation $n, $sha)
    {
        $this->m_author = $a;
        $this->m_nav = $n;
        $this->m_sha = $sha;
        $this->m_formId = 'view::webhookauthor' . $this->m_sha;
        $this->m_visible = $n->IsVisibilityTrueOrFalse($this->m_formId);
        $this->getHTML();
    }

    public function getHTML()
    {
        if(!$this->m_visible)
            return $this->m_nav->RenderFormThatCanToggleVisibility
            ('A U T H O R - - - S H O W', $this->m_visible, $this->m_sha, $this->m_formId);
        if($this->m_visible)
            $toggle = '';
            $toggle =  $this->m_nav->RenderFormThatCanToggleVisibility
            ('A U T H O R - - - H I D E', $this->m_visible, $this->m_sha, $this->m_formId);
         return
         "
         <div class='well'>
             <h4 class='h4'>Author</h4>
             {$toggle}
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