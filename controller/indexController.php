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

        $author = new \model\author
        (
            $data->{'commits'}[0]->{'author'}->{'name'},
            $data->{'commits'}[0]->{'author'}->{'email'},
            $data->{'commits'}[0]->{'author'}->{'username'}
        );

        $commits = new \model\commits
        (
            $data->{'commits'}[0]->{'id'},
            $data->{'commits'}[0]->{'distinct'},
            $data->{'commits'}[0]->{'message'},
            $data->{'commits'}[0]->{'timestamp'},
            $data->{'commits'}[0]->{'url'},
            $author
        );

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
            $commits,
            $data->{'head_commit'},
            $data->{'repository'},
            $data->{'pusher'},
            $data->{'sender'}
        );



        file_put_contents('webhook.data', print_r($payLoadDataGeneratedFromAWebHookAtGithub, true));

    }
}

