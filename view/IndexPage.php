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
        $jqueryCDN         = new \view\JqueryCDN();
        $jqueryCDNJSHTML   = $jqueryCDN->getJavascript();

        return
        "
        <!DOCTYPE html>
        <html lang='sv'>
            <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1'>
            $bootstrapCSSHTML
            <title>IWISH a simple continious integration (Beta 0.1)</title>
            </head>
            <body>
            <nav class=\"navbar navbar-default\">
              <div class=\"container-fluid\">
                <div class=\"navbar-header\">
                  <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\" aria-expanded=\"false\">
                <span class=\"sr-only\">Toggle navigation</span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                  </button>
                  <a class=\"navbar-brand\" href='?'>Iwish</a>
                </div>
              </div>
            </nav>
            $body
            $jqueryCDNJSHTML
            $bootstrapJSHTML
            </body>
        </html>
        ";

    }
}
