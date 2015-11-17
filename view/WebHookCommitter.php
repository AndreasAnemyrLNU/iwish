<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-12
 * Time: 20:44
 */

namespace view;


class WebHookCommitter
{
    private $m_committer;
    private $m_nav;
    private $m_sha;
    private $m_formId;
    private $m_visible;

    public function __construct(\model\Committer $m_committer, \view\Navigation $n, $sha)
    {
        $this->m_committer = $m_committer;
        $this->m_nav = $n;
        $this->m_sha = $sha;
        $this->m_formId = 'view::webhookcommitter' . $this->m_sha;
        $this->m_visible = $this->m_nav->IsVisibilityTrueOrFalse($this->m_formId);
        $this->getHTML();
    }

    public function getHTML()
    {
        if(!$this->m_visible)
            return $this->m_nav->RenderFormThatCanToggleVisibility
            ('C O M M I T E R - - - S H O W', $this->m_visible, $this->m_sha, $this->m_formId);
        if($this->m_visible)
            $toggle = '';
            $toggle =  $this->m_nav->RenderFormThatCanToggleVisibility
            ('C O M M I T E R - - - H I D E', $this->m_visible, $this->m_sha, $this->m_formId);
        return
        "
         <div class='well'>
             <h4 class='h4'>Committer</h4>
             {$toggle}
             <dl class='dl-horizontal'>
                <dt>Email: </dt>
                <dd>{$this->m_committer->getEmail()}</dd>
                <dt>Name: </dt>
                <dd>{$this->m_committer->getName()}</dd>
                <dt>Username: </dt>
                <dd>{$this->m_committer->getUsername()}</dd>
             </dl>
         </div>
         ";
    }
}