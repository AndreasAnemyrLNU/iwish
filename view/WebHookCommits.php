<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-12
 * Time: 20:25
 */

namespace view;


class WebHookCommits
{
    private $m_commits;

    /**
     * WebHookCommnits constructor.
     * @param $commits
     */
    public function __construct(\model\Commits $commits)
    {
        $this->m_commits = $commits;
        $this->getHTML();
    }

    public function getHTML()
    {
        return
        "
         <div class='well'>
             <h4 class='h4'>Commits</h4>
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
            {$this->RenderAdded($this->m_commits->getAdded())}
            {$this->RenderRemoved($this->m_commits->getRemoved())}
            {$this->RenderModified($this->m_commits->getModified())}
         </div>
         ";
    }

    public function RenderAuthor(\model\Author $a)
    {
        $html = new \view\WebHookAuthor($a);
        return $html->getHTML();
    }

    public function RenderCommitter(\model\Committer $c)
    {
        $html = new \view\WebHookCommitter($c);
        return $html->getHTML();
    }

    public function RenderAdded(\model\Added $a)
    {
        $html = new \view\WebHookAdded($a);
        return $html->getHTML();
    }

    public function RenderRemoved(\model\Removed $r)
    {
        $html = new \view\WebHookRemoved($r);
        return $html->getHTML();
    }

    public function RenderModified(\model\Modified $m)
    {
        $html = new \view\WebHookModified($m);
        return $html->getHTML();
    }
}