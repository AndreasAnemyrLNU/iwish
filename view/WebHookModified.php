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
    private $m_visible;
    private $m_commits;
    private $m_nav;
    private $m_sha;
    private $m_formId;
    private $m_previewCode;

    public function __construct(\model\Commits $committs, \view\Navigation $n, $previewCode)
    {
        $this->m_commits = $committs;
        $this->m_nav = $n;
        $this->m_sha = $this->m_commits->getId();
        $this->m_formId = 'view::webhookmodified' . $this->m_commits->getId();
        $this->m_visible = $n->IsVisibilityTrueOrFalse($this->m_formId);
        $this->m_previewCode = $previewCode;
        $this->getHTML();
    }

    public function getHTML()
    {
        if(!$this->m_visible)
            return $this->m_nav->RenderFormThatCanToggleVisibility
            ('M O D I F I E D (F I L E S) - - - S H O W', $this->m_visible, $this->m_sha, $this->m_formId);
        if($this->m_visible)
            $toggle = '';
            $toggle =  $this->m_nav->RenderFormThatCanToggleVisibility
            ('M O D I F I E D - - - H I D E', $this->m_visible, $this->m_sha, $this->m_formId);
        return
            "
        <div class='well'>
            <h4 class='h4'>Modified</h4>
                {$toggle}
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
                        <!-- Start Region :: View Code -->
                        <a  href=?{$this->m_nav->RenderGetParam($this->m_nav->getControllerKey(), $this->m_nav->GetViewCodeControllerValue())
                        }&{$this->m_nav->RenderGetParam($this->m_nav->GetFilesKey(), $this->m_nav->GetFilesModifiedValue())
                        }&{$this->m_nav->RenderGetParam($this->m_nav->GetFileNameKey(), $file )
                        }&{$this->m_nav->RenderGetParam($this->m_nav->GetShaKey(), $this->m_commits->getId() )}
                            class='btn btn-xs btn-info'  role='button'>View Code</a>
                        <pre>{$this->m_previewCode}</pre>
                        <!-- End -->
                        <!-- Start Region :: Republish -->
                        <a  href=?{$this->m_nav->RenderGetParam($this->m_nav->getControllerKey(), $this->m_nav->GetRepublishControllerValue())
                        }&{$this->m_nav->RenderGetParam($this->m_nav->GetFilesKey(), $this->m_nav->GetFilesModifiedValue())
                        }&{$this->m_nav->RenderGetParam($this->m_nav->GetFileNameKey(), $file )
                        }&{$this->m_nav->RenderGetParam($this->m_nav->GetShaKey(), $this->m_commits->getId() )}
                            class='btn btn-xs btn-warning'  role='button'>Republish</a>
                        <pre>{$this->m_previewCode}</pre>
                        <!-- End -->
                        <!-- Start  Region :: Delete -->
                        <a  href=?{$this->m_nav->RenderGetParam($this->m_nav->getControllerKey(), $this->m_nav->GetDeleteControllerValue())
                        }&{$this->m_nav->RenderGetParam($this->m_nav->GetFilesKey(), $this->m_nav->GetFilesModifiedValue())
                        }&{$this->m_nav->RenderGetParam($this->m_nav->GetFileNameKey(), $file )
                        }&{$this->m_nav->RenderGetParam($this->m_nav->GetShaKey(), $this->m_commits->getId() )}
                            class='btn btn-xs btn-danger'  role='button'>Delete</a>
                        <pre>{$this->m_previewCode}</pre>
                        <!-- End -->
                </li>";
    }
}