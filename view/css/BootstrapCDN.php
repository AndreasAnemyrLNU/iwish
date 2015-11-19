<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-12
 * Time: 02:17
 * @author Andreas Anemyr <andreas@anemyr.se>
 */

namespace view;


/**
 * Class BootstrapCDN
 * @package view
 */
class BootstrapCDN
{
    /**
     * @return string
     */
    public function getStyleheet()
    {
        return
        "<!-- Latest compiled and minified CSS -->
            <link   rel=\"stylesheet\"
                    href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css\"
                    integrity=\"sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==\"
                    crossorigin=\"anonymous\">";
    }

    /**
     * @return string
     */
    public function getJavascript()
    {
        return
        "<!-- Latest compiled and minified JavaScript -->
            <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js\"
                integrity=\"sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==\"
                crossorigin=\"anonymous\">
            </script>";
    }
}