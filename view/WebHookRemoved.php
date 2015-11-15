<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-12
 * Time: 22:32
 */

namespace view;


class WebHookRemoved
{
    private $m_commits;

    public function __construct(\model\Commits $committs)
    {
        $this->m_commits = $committs;
        $this->getHTML();
    }

    public function getHTML()
    {
        return
            "
        <div class='well'>
            <h4 class='h4'>Removed</h4>
                <ul>
                    {$this->RenderRemoved()}
                </ul>
        </div>
        ";
    }

    private function RenderRemoved()
    {
        $files = $this->m_commits->getRemoved()->getRemoved();

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