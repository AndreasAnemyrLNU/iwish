# iwish
##Programming Project - Part of course 1DV608 - Linnaeus Iniversity...

##[More Docuimentation about project](./wiki)

####USECASE 1

System can handle incoming postrequest generated from a github webhook from developers own repository
System cna parse JSON to own php object. 100% identical JSON incoming.
System store parsed data into own local archive for later visualization

    ######This if starts process  of usecase 1

    <pre>
    if($this->gitPayLoadView->DidGithubSendArchiveParamSetToTrue())
    {
        $gitController = new \controller\GitController();
        $gitController->doParse($this->gitPayLoadView->GetPayLoad());
    }
    </pre>
<pre>
new \controller\SessionController($this->nav, $this->m_sessionHandler);

            $this->nav->ClientTogglesVisibility();

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

            if($this->nav->ClientWantsToViewCode())
            {
                $webhook = $this->nav->GetWebhookBySha($this->webhookCollection);
                $viewCodeController = new \controller\ViewCodeController($webhook, $this->nav);
                $previewCode = $viewCodeController->DoViewCode();
            }
</pre>