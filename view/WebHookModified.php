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
    private $m_modified;

    /**
     * WebHookModified constructor.
     * @param $modified
     */
    public function __construct(\model\Modified $modified)
    {
        $this->m_modified = $modified;
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
        $files = $this->m_modified->getModified();
        $ret = "";
        foreach($files as $file)
        {
            $ret.= $this->RenderFilesLi($file);
        }
        return $ret;
    }

    private function RenderFilesLi($filestring)
    {
        return "<li>$filestring</li>";
    }
}