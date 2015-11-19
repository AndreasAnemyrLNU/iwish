# iwish
##Programming Project - Part of course 1DV608 - Linnaeus Iniversity...

##[More Documentation about project](./../../wiki)
##[Demo Installation](http://www.xponeras.se/1dv608/iwish/)
##[Introduction Youtube(Swedish)](https://www.youtube.com/watch?v=E3m2-Ryo-9Y&list=PLRFqBeKyQ8ovgqVC_MvLt1rVJVLRma_Ox)


####USECASE 1

System can handle incoming postrequest generated from a github webhook from developers own repository
System can parse JSON to own php object. 100% identical JSON incoming.
System store parsed data into own local archive for later visualization

Properly working usecase!

######Usecase starts in IndexController by the if-statement below...

    <pre>
    if($this->gitPayLoadView->DidGithubSendArchiveParamSetToTrue())
    {
        $gitController = new \controller\GitController();
        $gitController->doParse($this->gitPayLoadView->GetPayLoad());
    }
    </pre>

####USECASE 2

System is prepared for using Sessions

######Usecase starts in IndexController by this code

<pre>
    new \controller\SessionController($this->nav, $this->m_sessionHandler);
</pre>

####USECASE 3

Views can handle to toggle visibility using Cookies.

Forms is generated effectiveness without string dependencies

Properly working usecase!
<pre>
            $this->nav->ClientTogglesVisibility();
</pre>

####USECASE 4

Client can restore a previos file from commit history

Properly working usecase!

######Usecase starts in IndexController by the two if-statements below...

<pre>
    if($this->nav->ClientWantsTheDownloadController())
    {
        $downloadController = new \controller\DownloadController($this->nav);
        $downloadController->DoDownload();
    }

    if($this->nav->ClientWantsToRepublish())
    {
        $webhook = $this->nav->GetWebhookBySha($this->webhookCollection);
        $republishController = new \controller\RepublishController($webhook, $this->nav);
        $republishController->DoRepublish();
    }
</pre>

####USECASE 5

Client can view code from a previos file in commit history
NOT 100% Properly working usecase!

######Usecase starts in IndexController by the if-statements below...

<pre>
            if($this->nav->ClientWantsToViewCode())
            {
                $webhook = $this->nav->GetWebhookBySha($this->webhookCollection);
                $viewCodeController = new \controller\ViewCodeController($webhook, $this->nav);
                $previewCode = $viewCodeController->DoViewCode();
            }
</pre>