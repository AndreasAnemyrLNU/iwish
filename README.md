# iwish
##Programming Project - Part of course 1DV608 - Linnaeus Iniversity...


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
