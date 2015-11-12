<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-11
 * Time: 21:26
 */

namespace view;


class indexPage
{
    public function getHTML($body)
    {
        $bootstrapCDN      = new \view\BootstrapCDN();
        $bootstrapCSSHTML  = $bootstrapCDN->getStyleheet();
        $bootstrapJSHTML   = $bootstrapCDN->getJavascript();

        return
        "
        <!DOCTYPE html>
        <html lang=\"sv\">
            <head>
            <meta charset=\"UTF-8\">
            $bootstrapCSSHTML
            <title></title>
            </head>
            <body>
                $body
                $bootstrapJSHTML
            </body>
        </html>
        ";

    }
}