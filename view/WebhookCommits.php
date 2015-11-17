<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-12
 * Time: 20:25
 */

namespace view;


class WebhookCommits
{
    private $m_nav;
    private $m_commits;
    private $m_sha;
    private $m_formId;
    private $m_visible;
    private $m_previewCode;

    public function __construct(\model\Commits $commits, \view\Navigation $nav, $previewCode = '')
    {
        $this->m_nav = $nav;
        $this->m_commits = $commits;
        $this->m_sha = $this->m_commits->getId();
        $this->m_formId = 'view::webhoocommits' . $this->m_commits->getId();
        $this->m_visible = $this->m_nav->IsVisibilityTrueOrFalse($this->m_formId);
        $this->getHTML();
    }

    public function GetCommits()
    {
        return $this->m_commits;
    }

    public function getHTML()
    {
        if(!$this->m_visible)
            return $this->m_nav->RenderFormThatCanToggleVisibility
            ('C O M M I T - - - S H O W', $this->m_visible, $this->m_sha, $this->m_formId);
        if($this->m_visible)
            $toggle = '';
        $toggle =  $this->m_nav->RenderFormThatCanToggleVisibility
        ('C O M M I T - - - H I D E', $this->m_visible, $this->m_sha, $this->m_formId);

        return
        "
         <div class='well'>
             <h4 class='h4'>Commits</h4>
             {$toggle}
             <dl class='dl-horizontal'>
                <dt>Id: </dt>
                    <dd>{$this->m_commits->getId()}</dd>
                <dt>Distinct: </dt>
                    <dd>{$this->m_commits->getDistinct()}</dd>
                <dt>Message: </dt>
                    <dd>{$this->m_commits->getMessage()}</dd>
                <dt>Timestamp: </dt>
                    <dd>{$this->m_commits->getTimestamp()}</dd>
                 <dt>Url: </dt>
                    <dd>{$this->m_commits->getUrl()}</dd>
             </dl>
            {$this->RenderAuthor($this->m_commits->getAuthor())}
            {$this->RenderCommitter($this->m_commits->getCommitter())}
            {$this->RenderAdded($this->m_commits, $this->m_nav, $this->m_previewCode)}
            {$this->RenderRemoved($this->m_commits, $this->m_nav, $this->m_previewCode)}
            {$this->RenderModified($this->m_commits, $this->m_nav, $this->m_previewCode)}
         </div>
         ";
    }

    public function RenderAuthor(\model\Author $a)
    {
        $html = new \view\WebHookAuthor($a, $this->m_nav, $this->m_sha);
        return $html->getHTML();
    }

    public function RenderCommitter(\model\Committer $c)
    {
        $html = new \view\WebHookCommitter($c, $this->m_nav, $this->m_sha);
        return $html->getHTML();
    }

    public function RenderAdded(\model\Commits $c, \view\Navigation $n, $previewCode = '')
    {
        $html = new \view\WebHookAdded($c, $n, $previewCode = '');
        return $html->getHTML();
    }

    public function RenderRemoved(\model\Commits $c, \view\Navigation $n)
    {
        $html = new \view\WebHookRemoved($c, $n);
        return $html->getHTML();
    }

    public function RenderModified(\model\Commits $c, \view\Navigation $n)
    {
        $html = new \view\WebHookModified($c, $n);
        return $html->getHTML();
    }
}