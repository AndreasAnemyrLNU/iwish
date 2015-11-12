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
     * @param $m_commits
     */
    public function __construct(\model\Commits $m_commits)
    {
        $this->m_commits = $m_commits;
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
             </dl>
         </div>
         ";
    }
}