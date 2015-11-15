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
                        <!-- Start Region :: View Code -->
                        <a  href=?{$this->m_nav->RenderGetParam($this->m_nav->getControllerKey(), $this->m_nav->GetViewCodeControllerValue())
                        }&{$this->m_nav->RenderGetParam($this->m_nav->GetFilesKey(), $this->m_nav->GetFilesAddedValue())
                        }&{$this->m_nav->RenderGetParam($this->m_nav->GetFileNameKey(), $file )
                        }&{$this->m_nav->RenderGetParam($this->m_nav->GetShaKey(), $this->m_commits->getId() )}
                            class='btn btn-xs btn-info'  role='button'>View Code</a>
                        <!-- End -->
                        <!-- Start Region :: Republish -->
                        <a  href=?{$this->m_nav->RenderGetParam($this->m_nav->getControllerKey(), $this->m_nav->GetRepublishControllerValue())
                        }&{$this->m_nav->RenderGetParam($this->m_nav->GetFilesKey(), $this->m_nav->GetFilesAddedValue())
                        }&{$this->m_nav->RenderGetParam($this->m_nav->GetFileNameKey(), $file )
                        }&{$this->m_nav->RenderGetParam($this->m_nav->GetShaKey(), $this->m_commits->getId() )}
                            class='btn btn-xs btn-warning'  role='button'>Republish</a>
                        <!-- End -->
                        <!-- Start  Region :: Delete -->
                        <a  href=?{$this->m_nav->RenderGetParam($this->m_nav->getControllerKey(), $this->m_nav->GetDeleteControllerValue())
                        }&{$this->m_nav->RenderGetParam($this->m_nav->GetFilesKey(), $this->m_nav->GetFilesAddedValue())
                        }&{$this->m_nav->RenderGetParam($this->m_nav->GetFileNameKey(), $file )
                        }&{$this->m_nav->RenderGetParam($this->m_nav->GetShaKey(), $this->m_commits->getId() )}
                            class='btn btn-xs btn-danger'  role='button'>Delete</a>
                        <!-- End -->
                </li>";
    }
}