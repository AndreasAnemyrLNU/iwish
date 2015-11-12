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
    private $m_Removed;

    /**
     * WebHookRemoved constructor.
     * @param $removed
     */
    public function __construct(\model\Removed $removed)
    {
        $this->m_removed = $removed;
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
        $files = $this->m_removed->getRemoved();
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