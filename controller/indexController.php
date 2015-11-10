<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-10
 * Time: 11:26
 */

namespace controller;


class indexController
{

    public function doIndex()
    {

        //Init model/object from _POST['payload'] created @ github in a repo.
        $data = json_decode($_POST['payload']);
        $payLoadDataGeneratedFromAWebHookAtGithub = new \model\webhook
        (
            $data->{'ref'},
            $data->{'before'},
            $data->{'after'},
            $data->{'created'},
            $data->{'deleted'},
            $data->{'forced'},
            $data->{'base_ref'},
            $data->{'compare'},
            new \model\commits
                ($data->{'commits'}{0}
                ),
            $data->{'head_commit'},
            $data->{'repository'},
            $data->{'pusher'},
            $data->{'sender'}
        );



        file_put_contents('webhook.data', print_r($payLoadDataGeneratedFromAWebHookAtGithub, true));

    }
}

