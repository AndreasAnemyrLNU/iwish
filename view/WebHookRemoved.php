<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-12
 * Time: 22:32
 * @author Andreas Anemyr <andreas@anemyr.se>
 */

namespace view;


class WebHookRemoved
{
    private $m_visible;
    private $m_commits;
    private $m_nav;
    private $m_sha;
    private $m_formId;
    private $m_previewCode;

    /**
     * @param \model\Commits $committs
     * @param Navigation $n
     * @param $previewCode
     */
    public function __construct(\model\Commits $committs, \view\Navigation $n, $previewCode)
    {
        $this->m_commits = $committs;
        $this->m_nav = $n;
        $this->m_sha = $this->m_commits->getId();
        $this->m_formId = 'view::webhookremoved' . $this->m_commits->getId();
        $this->m_visible = $this->m_nav->IsVisibilityTrueOrFalse($this->m_formId);
        $this->m_previewCode = $previewCode;
        $this->getHTML();
    }

    /**
     * @return string
     */
    public function getHTML()
    {
        if(!$this->m_visible)
            return $this->m_nav->RenderFormThatCanToggleVisibility
            ('R E M O V E D (F I L E S) - - - S H O W', $this->m_visible, $this->m_sha, $this->m_formId);
        if($this->m_visible)
            $toggle = '';
            $toggle =  $this->m_nav->RenderFormThatCanToggleVisibility
            ('R E M O V E D - - - H I D E', $this->m_visible, $this->m_sha, $this->m_formId);

        return
            "
        <div class='well'>
            <h4 class='h4'>Removed Files</h4>
                {$toggle}
                <ul>
                    {$this->RenderRemoved()}
                </ul>
        </div>
        ";
    }

    /**
     * @return string
     */
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

    /**
     * @param $file
     * @return string
     */
    private function RenderFilesLi($file)
    {
        return "<li>
                    <p>$file</p>
                        <!-- Start Region :: View Code -->
                        <a  href=?{$this->m_nav->RenderGetParam($this->m_nav->getControllerKey(), $this->m_nav->GetViewCodeControllerValue())
                        }&{$this->m_nav->RenderGetParam($this->m_nav->GetFilesKey(), $this->m_nav->GetFilesRemovedValue())
                        }&{$this->m_nav->RenderGetParam($this->m_nav->GetFileNameKey(), $file )
                        }&{$this->m_nav->RenderGetParam($this->m_nav->GetShaKey(), $this->m_commits->getId() )}
                            class='btn btn-xs btn-info'  role='button'>View Code</a>
                        <pre>{$this->m_previewCode}</pre>
                        <!-- End -->
                        <!-- Start Region :: Republish -->
                        <a  href=?{$this->m_nav->RenderGetParam($this->m_nav->getControllerKey(), $this->m_nav->GetRepublishControllerValue())
                        }&{$this->m_nav->RenderGetParam($this->m_nav->GetFilesKey(), $this->m_nav->GetFilesRemovedValue())
                        }&{$this->m_nav->RenderGetParam($this->m_nav->GetFileNameKey(), $file )
                        }&{$this->m_nav->RenderGetParam($this->m_nav->GetShaKey(), $this->m_commits->getId() )}
                            class='btn btn-xs btn-warning'  role='button'>Republish</a>
                        <!-- End -->
                        <!-- Start  Region :: Delete -->
                        <a  href=?{$this->m_nav->RenderGetParam($this->m_nav->getControllerKey(), $this->m_nav->GetDeleteControllerValue())
                        }&{$this->m_nav->RenderGetParam($this->m_nav->GetFilesKey(), $this->m_nav->GetFilesRemovedValue())
                        }&{$this->m_nav->RenderGetParam($this->m_nav->GetFileNameKey(), $file )
                        }&{$this->m_nav->RenderGetParam($this->m_nav->GetShaKey(), $this->m_commits->getId() )}
                            class='btn btn-xs btn-danger'  role='button'>Delete</a>
                        <!-- End -->
                </li>";
    }
}