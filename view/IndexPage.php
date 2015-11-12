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

        $bootstrapHTML = new \view\BootstrapCDN();


        return
        "
        <!DOCTYPE html>
        <html lang=\"sv\">
            <head>
            <meta charset=\"UTF-8\">
            $bootstrapHTML
            <title></title>
            </head>
            <body>
                $body
            </body>
        </html>
        ";

    }
}