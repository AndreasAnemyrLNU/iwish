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
    private $m_added;

    /**
     * WebHookAdded constructor.
     * @param $added
     */
    public function __construct(\model\Added $added)
    {
        $this->m_added = $added;
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
        $files = $this->m_added->getAdded();
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