<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-12
 * Time: 20:55
 * @author Andreas Anemyr <andreas@anemyr.se>
 */

namespace view;


class WebHookAdded
{
    /**
     * @var bool
     */
    private $m_visible;

    /**
     * @var \model\Commits
     */
    private $m_commits;

    /**
     * @var Navigation
     */
    private $m_nav;

    /**
     * @var mixed
     */
    private $m_sha;

    private $m_formId;
    /**
     * @var string
     */
    private $m_previewCode;

    /**
     * @param \model\Commits $committs
     * @param Navigation $n
     * @param string $previewCode
     */
    public function __construct(\model\Commits $committs, \view\Navigation $n, $previewCode = '')
    {
        $this->m_commits = $committs;
        $this->m_nav = $n;
        $this->m_sha = $this->m_commits->getId();
        $this->m_formId = 'view::webhookadded' . $this->m_commits->getId();
        $this->m_visible = $n->IsVisibilityTrueOrFalse($this->m_formId);
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
            ('A D D E D (F I L E S) - - - S H O W', $this->m_visible, $this->m_sha, $this->m_formId);
        if($this->m_visible)
            $toggle = '';
            $toggle =  $this->m_nav->RenderFormThatCanToggleVisibility
            ('A D D E D - - - H I D E', $this->m_visible, $this->m_sha, $this->m_formId);

        return
        "
        <div class='well'>
            <h4 class='h4'>Added</h4>
                {$toggle}
                <ul>
                    {$this->RenderAdded()}
                </ul>
        </div>
        ";
    }

    /**
     * @return string
     * @throws \Exception
     */
        private function RenderAdded()
    {
        $files = $this->m_commits->getAdded()->getAdded();

        $ret = "";
        foreach($files as $file)
        {
            //TODO Preven reading when not necessary. Later...
            $test = new \model\webhookFileSystemDAL();
            $codeReader =new \model\ViewCode($test->Read()->GetWebHookByIdOfCommits($this->m_sha), 'Added', $file );

            $previewCode = $codeReader->GetContentInFile();

            $ret.= $this->RenderFilesLi($file, $previewCode);

        }
        return $ret;
    }

    /**
     * @param $file
     * @param $previewCode
     * @return string
     */
        private function RenderFilesLi($file, $previewCode)
    {
        return "<li>
                    <p>$file</p>
                        <!-- Start Region :: View Code -->
                        <a  href=?{$this->m_nav->RenderGetParam($this->m_nav->getControllerKey(), $this->m_nav->GetViewCodeControllerValue())
                        }&{$this->m_nav->RenderGetParam($this->m_nav->GetFilesKey(), $this->m_nav->GetFilesAddedValue())
                        }&{$this->m_nav->RenderGetParam($this->m_nav->GetFileNameKey(), $file )
                        }&{$this->m_nav->RenderGetParam($this->m_nav->GetShaKey(), $this->m_commits->getId() )}
                            class='btn btn-xs btn-info'  role='button'>View Code</a>
                        <pre>{$previewCode}</pre>
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