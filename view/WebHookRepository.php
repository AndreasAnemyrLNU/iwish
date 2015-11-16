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
    private $visible;
    private $m_repository;
    private $m_nav;
    private $m_sha;

    public function __construct(\model\Repository $r, \view\Navigation $n, $sha)
    {
        $this->m_repository = $r;
        $this->m_nav = $n;
        $this->m_sha = $sha;
        $this->getHTML();
    }

    public function getHTML()
    {
        if(!$this->visible)
            return $this->m_nav->RenderFormThatCanMakeContentVisible
            ('> > > R E P O S I T O R Y > > > ' . $this->m_sha, $this->visible, $this->m_sha);

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
                <dt>Pulls Url: </dt>
                    <dd>{$this->m_repository->getPullsUrl()}</dd>
                 <dt>Milestones Url: </dt>
                    <dd>{$this->m_repository->getMilestonesUrl()}</dd>
                <dt>Notifications Url: </dt>
                    <dd>{$this->m_repository->getNotificationsUrl()}</dd>
                <dt>Labels Url: </dt>
                    <dd>{$this->m_repository->getLabelsUrl()}</dd>
                <dt>Releases Url: </dt>
                    <dd>{$this->m_repository->getReleasesUrl()}</dd>
                <dt>Created at: </dt>
                    <dd>{$this->m_repository->getCreatedAt()}</dd>
                <dt>Updated at: </dt>
                    <dd>{$this->m_repository->getUpdatedAt()}</dd>
                <dt>Pushed at: </dt>
                    <dd>{$this->m_repository->getPushedAt()}</dd>
                <dt>Git Url: </dt>
                    <dd>{$this->m_repository->getGitUrl()}</dd>
                <dt>SSH Url: </dt>
                    <dd>{$this->m_repository->getSshUrl()}</dd>
                <dt>Clone Url: </dt>
                    <dd>{$this->m_repository->getCloneUrl()}</dd>
                <dt>SVN Url: </dt>
                    <dd>{$this->m_repository->getSvnUrl()}</dd>
                <dt>Homepage Url: </dt>
                    <dd>{$this->m_repository->getHomepage()}</dd>
                <dt>Size: </dt>
                    <dd>{$this->m_repository->getSize()}</dd>
                <dt>Stargazers Count: </dt>
                    <dd>{$this->m_repository->getStargazersCount()}</dd>
                <dt>Watchers Count: </dt>
                    <dd>{$this->m_repository->getWatchersCount()}</dd>
                <dt>Language: </dt>
                    <dd>{$this->m_repository->getLanguage()}</dd>
                <dt>Has issues: </dt>
                    <dd>{$this->m_repository->getHasIssues()}</dd>
                <dt>Has downloads: </dt>
                    <dd>{$this->m_repository->getHasDownloads()}</dd>
                <dt>Has wiki: </dt>
                    <dd>{$this->m_repository->getHasWiki()}</dd>
                <dt>Has Pages: </dt>
                    <dd>{$this->m_repository->getHasPages()}</dd>
                <dt>Forks: </dt>
                    <dd>{$this->m_repository->getForks()}</dd>
                <dt>Open issues: </dt>
                    <dd>{$this->m_repository->getOpenIssues()}</dd>
                <dt>Watchers: </dt>
                    <dd>{$this->m_repository->getWatchers()}</dd>
                <dt>Default Branch: </dt>
                    <dd>{$this->m_repository->getDefaultBranch()}</dd>
                <dt>Stargazers: </dt>
                    <dd>{$this->m_repository->getStargazers()}</dd>
                <dt>Master branch: </dt>
                    <dd>{$this->m_repository->getMasterBranch()}</dd>
             </dl>
         </div>
         ";
    }

    public function ShowIt()
    {
        return
        "
        <form method='get' class='form-horizontal' role='form'>
            <div class='form-group'>
                <input  type='hidden'
                        name='{$this->m_nav->GetVisibleStatusKey()}'
                        value='{$this->m_nav->ToggleVisibleStatus($this->visible, true)}'>
                <input  type='hidden'
                        name='{$this->m_nav->GetShaKey()}'
                        value='{$this->m_sha}'>
            </div>
            <div class='form-group'>
                <button type='submit' class='btn btn-block btn-info'>Show Repository</button>
            </div>
        </form>
        ";
    }
}
/*
private static $visibleStatusKey = 'visibleStatusKey';
public function GetVisibleStatusKey(){return self::$visibleStatusKey;}
private static $visibleStatusValueTrue = true;
public function GetVisibleStatusValueAsTrue(){return self::$visibleStatusValueTrue;}
private static $visibleStatusValueFalse = false;
public function GetVisibleStatusValueAsFalse(){return self::$visibleStatusValueFalse;}*/