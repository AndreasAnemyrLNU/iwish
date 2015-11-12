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




        return
        "
        <!DOCTYPE html>
        <html lang=\"sv\">
            <head>
            <meta charset=\"UTF-8\">
            <title></title>
            </head>
            <body>
                $body
            </body>
        </html>
        ";

    }
}