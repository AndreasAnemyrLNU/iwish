<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-12
 * Time: 22:46
 */

namespace view;


class WebHookRepository
{
    private $m_repository;

    /**
     * WebHookRepository constructor.
     * @param $m_repository
     */
    public function __construct(\model\Repository $m_repository)
    {
        $this->m_repository = $m_repository;
        $this->getHTML();
    }

    public function getHTML()
    {
        return
            "
         <div class='well'>
             <h4 class='h4'>Repository</h4>
             <dl class='dl-horizontal'>
                <dt>Id: </dt>
                    <dd>{$this->m_repository->getId()}</dd>
                <dt>Name: </dt>
                    <dd>{$this->m_repository->getName()}</dd>
                <dt>Full Name: </dt>
                    <dd>{$this->m_repository->getFullName()}</dd>
                <dt>Owner: </dt>
                    <dd>OBS Ersätt med objekt owner!</dd>
                <dt>Private: </dt>
                    <dd>{$this->m_repository->getPrivate()}</dd>
                <dt>Html Url: </dt>
                    <dd>{$this->m_repository->getHtmlUrl()}</dd>
                <dt>Description: </dt>
                    <dd>{$this->m_repository->getDescriptions()}</dd>
                <dt>Fork: </dt>
                    <dd>{$this->m_repository->getFork()}</dd>
                <dt>Fork Url: </dt>
                    <dd>{$this->m_repository->getForksUrl()}</dd>
                <dt>Keys Url: </dt>
                    <dd>{$this->m_repository->getKeysUrl()}</dd>
                <dt>Colloborators Url: </dt>
                    <dd>{$this->m_repository->getCollaboratorsUrl()}</dd>
                <dt>Team Url: </dt>
                    <dd>{$this->m_repository->getTeamsUrl()}</dd>
                <dt>Hooks Url: </dt>
                    <dd>{$this->m_repository->getHooksUrl()}</dd>
                <dt>Issue Events Url: </dt>
                    <dd>{$this->m_repository->getIssueEventsUrl()}</dd>
                <dt>Events Url: </dt>
                    <dd>{$this->m_repository->getEventsUrl()}</dd>
                <dt>Assignees Url: </dt>
                    <dd>{$this->m_repository->getAssigneesUrl()}</dd>
                <dt>Branches Url: </dt>
                    <dd>{$this->m_repository->getBranchesUrl()}</dd>
                <dt>Tags Url: </dt>
                    <dd>{$this->m_repository->getTagsUrl()}</dd>
                <dt>Blobs Url: </dt>
                    <dd>{$this->m_repository->getBlobsUrl()}</dd>
                <dt>Git Tags Url: </dt>
                    <dd>{$this->m_repository->getGitTagsUrl()}</dd>
                <dt>Git Refs Url: </dt>
                    <dd>{$this->m_repository->getGitRefsUrl()}</dd>
                <dt>Trees Url: </dt>
                    <dd>{$this->m_repository->getTreesUrl()}</dd>
                <dt>Statuses Url: </dt>
                    <dd>{$this->m_repository->getStatusesUrl()}</dd>
                <dt>Languages Url: </dt>
                    <dd>{$this->m_repository->getLanguagesUrl()}</dd>
                <dt>Stargazers Url: </dt>
                    <dd>{$this->m_repository->getStargazersUrl()}</dd>
                <dt>Contributors Url: </dt>
                    <dd>{$this->m_repository->getContributorsUrl()}</dd>
                <dt>Subscribers Url: </dt>
                    <dd>{$this->m_repository->getSubscribersUrl()}</dd>
                <dt>Subscription Url: </dt>
                    <dd>{$this->m_repository->getSubscriptionUrl()}</dd>
                <dt>Commits Url: </dt>
                    <dd>{$this->m_repository->getCommitsUrl()}</dd>
                <dt>Git Commits Url: </dt>
                    <dd>{$this->m_repository->getGitCommitsUrl()}</dd>
                <dt>Comments Url: </dt>
                    <dd>{$this->m_repository->getCommentsUrl()}</dd>
                <dt>Issue Comment Url: </dt>
                    <dd>{$this->m_repository->getIssueCommentUrl()}</dd>
                <dt>Contents Url: </dt>
                    <dd>{$this->m_repository->getContentsUrl()}</dd>
                <dt>Compare Url: </dt>
                    <dd>{$this->m_repository->getCompareUrl()}</dd>
                <dt>Merges Url: </dt>
                    <dd>{$this->m_repository->getMergesUrl()}</dd>
                <dt>Archive Url: </dt>
                    <dd>{$this->m_repository->getArchiveUrl()}</dd>
                <dt>Downloads Url: </dt>
                    <dd>{$this->m_repository->getDownloadsUrl()}</dd>
                <dt>Issues Url: </dt>
                    <dd>{$this->m_repository->getIssuesUrl()}</dd>
             </dl>
         </div>
         ";
    }

    /*
    public function RenderAuthor(\model\Author $a)
    {
        $html = new \view\WebHookAuthor($a);
        return $html->getHTML();
    }

    public function RenderCommitter(\model\Committer $c)
    {
        $html = new \view\WebHookCommitter($c);
        return $html->getHTML();
    }

    public function RenderAdded(\model\Added $a)
    {
        $html = new \view\WebHookAdded($a);
        return $html->getHTML();
    }

    public function RenderRemoved(\model\Removed $r)
    {
        $html = new \view\WebHookRemoved($r);
        return $html->getHTML();
    }

    public function RenderModified(\model\Modified $m)
    {
        $html = new \view\WebHookModified($m);
        return $html->getHTML();
    }
    */
}