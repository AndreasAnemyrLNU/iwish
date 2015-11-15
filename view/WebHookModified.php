<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-12
 * Time: 22:41
 */

namespace view;

class WebHookModified
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
            <h4 class='h4'>Modified</h4>
                <ul>
                    {$this->RenderModified()}
                </ul>
        </div>
        ";
    }

    private function RenderModified()
    {
        $files = $this->m_commits->getModified()->getModified();

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
                        <a href=''  class='btn btn-xs btn-success' role='button'>View Code</a>
                        <a href=''  class='btn btn-xs btn-danger'  role='button'>Republish</a>
                        <a href=''  class='btn btn-xs btn-danger'  role='button'>Delete!</a>
                </li>";
    }
}