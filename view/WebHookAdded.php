<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-12
 * Time: 20:55
 */

namespace view;


class WebHookAdded
{
    private $m_commits;
    private $m_nav;

    public function __construct(\model\Commits $committs, \view\Navigation $n)
    {
        $this->m_commits = $committs;
        $this->m_nav = $n;
        $this->getHTML();
    }

    public function getHTML()
    {
        return
        "
        <div class='well'>
            <h4 class='h4'>Added</h4>
                <ul>
                    {$this->RenderAdded()}
                </ul>
        </div>
        ";
    }

    private function RenderAdded()
    {
        $files = $this->m_commits->getAdded()->getAdded();

        $ret = "";
        foreach($files as $file)
        {
            $ret.= $this->RenderFilesLi($file);
        }
        return $ret;
    }

    private function RenderFilesLi($file)
    {
        return "<li>
                    <p>$file</p>
                        <a  href=?{$this->m_nav->RenderGetParam($this->m_nav->getControllerKey(), $this->m_nav->getDownLoadControllerValue())}&{$this->m_nav->RenderGetParam('sadf', '123')}
                            class='btn btn-xs btn-success' role='button'>View Code</a>
                        <a  href=''
                            class='btn btn-xs btn-danger'  role='button'>Republish</a>
                        <a  href=''
                            class='btn btn-xs btn-danger'  role='button'>Delete!</a>
                </li>";
    }
}