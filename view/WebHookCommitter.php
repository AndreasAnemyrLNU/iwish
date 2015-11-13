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

    /**
     * WebHookCommitter constructor.
     * @param $m_committer
     */
    public function __construct(\model\Committer $m_committer)
    {
        $this->m_committer = $m_committer;
        $this->getHTML();
    }

    public function getHTML()
    {
        return
        "
         <div class='well'>
             <h4 class='h4'>Committer</h4>
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