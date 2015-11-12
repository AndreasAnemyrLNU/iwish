<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-10
 * Time: 21:14
 */

namespace model;


class Repository
{
    private $id;
    private $name;
    private $full_name;
    private $owner;
    private $private;
    private $html_url;
    private $descriptions;
    private $fork;
    private $url;
    private $forks_url;
    private $keys_url;
    private $collaborators_url;
    private $teams_url;
    private $hooks_url;
    private $issue_events_url;
    private $events_url;
    private $assignees_url;
    private $branches_url;
    private $tags_url;
    private $blobs_url;
    private $git_tags_url;
    private $git_refs_url;
    private $trees_url;
    private $statuses_url;
    private $languages_url;
    private $stargazers_url;
    private $contributors_url;
    private $subscribers_url;
    private $subscription_url;
    private $commits_url;
    private $git_commits_url;
    private $comments_url;
    private $issue_comment_url;
    private $contents_url;
    private $compare_url;
    private $merges_url;
    private $archive_url;
    private $downloads_url;
    private $issues_url;
    private $pulls_url;
    private $milestones_url;
    private $notifications_url;
    private $labels_url;
    private $releases_url;
    private $created_at;
    private $updated_at;
    private $pushed_at;
    private $git_url;
    private $ssh_url;
    private $clone_url;
    private $svn_url;
    private $homepage;
    private $size;
    private $stargazers_count;
    private $watchers_count;
    private $language;
    private $has_issues;
    private $has_downloads;
    private $has_wiki;
    private $has_pages;
    private $forks_count;
    private $mirror_url;
    private $open_issues_count;
    private $forks;
    private $open_issues;
    private $watchers;
    private $default_branch;
    private $stargazers;
    private $master_branch;

    /**
     * Repository constructor.
     * @param $id
     * @param $name
     * @param $full_name
     * @param $owner
     * @param $private
     * @param $html_url
     * @param $descriptions
     * @param $fork
     * @param $url
     * @param $forks_url
     * @param $keys_url
     * @param $collaborators_url
     * @param $teams_url
     * @param $hooks_url
     * @param $issue_events_url
     * @param $events_url
     * @param $assignees_url
     * @param $branches_url
     * @param $tags_url
     * @param $blobs_url
     * @param $git_tags_url
     * @param $git_refs_url
     * @param $trees_url
     * @param $statuses_url
     * @param $languages_url
     * @param $stargazers_url
     * @param $contributors_url
     * @param $subscribers_url
     * @param $subscription_url
     * @param $commits_url
     * @param $git_commits_url
     * @param $comments_url
     * @param $issue_comment_url
     * @param $contents_url
     * @param $compare_url
     * @param $merges_url
     * @param $archive_url
     * @param $downloads_url
     * @param $issues_url
     * @param $pulls_url
     * @param $milestones_url
     * @param $notifications_url
     * @param $labels_url
     * @param $releases_url
     * @param $created_at
     * @param $updated_at
     * @param $pushed_at
     * @param $git_url
     * @param $ssh_url
     * @param $clone_url
     * @param $svn_url
     * @param $homepage
     * @param $size
     * @param $stargazers_count
     * @param $watchers_count
     * @param $language
     * @param $has_issues
     * @param $has_downloads
     * @param $has_wiki
     * @param $has_pages
     * @param $forks_count
     * @param $mirror_url
     * @param $open_issues_count
     * @param $forks
     * @param $open_issues
     * @param $watchers
     * @param $default_branch
     * @param $stargazers
     * @param $master_branch
     */
    public function __construct($id, $name, $full_name, \model\owner $owner, $private, $html_url, $descriptions, $fork, $url, $forks_url, $keys_url, $collaborators_url, $teams_url, $hooks_url, $issue_events_url, $events_url, $assignees_url, $branches_url, $tags_url, $blobs_url, $git_tags_url, $git_refs_url, $trees_url, $statuses_url, $languages_url, $stargazers_url, $contributors_url, $subscribers_url, $subscription_url, $commits_url, $git_commits_url, $comments_url, $issue_comment_url, $contents_url, $compare_url, $merges_url, $archive_url, $downloads_url, $issues_url, $pulls_url, $milestones_url, $notifications_url, $labels_url, $releases_url, $created_at, $updated_at, $pushed_at, $git_url, $ssh_url, $clone_url, $svn_url, $homepage, $size, $stargazers_count, $watchers_count, $language, $has_issues, $has_downloads, $has_wiki, $has_pages, $forks_count, $mirror_url, $open_issues_count, $forks, $open_issues, $watchers, $default_branch, $stargazers, $master_branch)
    {
        $this->id = $id;
        $this->name = $name;
        $this->full_name = $full_name;
        $this->owner = $owner;
        $this->private = $private;
        $this->html_url = $html_url;
        $this->descriptions = $descriptions;
        $this->fork = $fork;
        $this->url = $url;
        $this->forks_url = $forks_url;
        $this->keys_url = $keys_url;
        $this->collaborators_url = $collaborators_url;
        $this->teams_url = $teams_url;
        $this->hooks_url = $hooks_url;
        $this->issue_events_url = $issue_events_url;
        $this->events_url = $events_url;
        $this->assignees_url = $assignees_url;
        $this->branches_url = $branches_url;
        $this->tags_url = $tags_url;
        $this->blobs_url = $blobs_url;
        $this->git_tags_url = $git_tags_url;
        $this->git_refs_url = $git_refs_url;
        $this->trees_url = $trees_url;
        $this->statuses_url = $statuses_url;
        $this->languages_url = $languages_url;
        $this->stargazers_url = $stargazers_url;
        $this->contributors_url = $contributors_url;
        $this->subscribers_url = $subscribers_url;
        $this->subscription_url = $subscription_url;
        $this->commits_url = $commits_url;
        $this->git_commits_url = $git_commits_url;
        $this->comments_url = $comments_url;
        $this->issue_comment_url = $issue_comment_url;
        $this->contents_url = $contents_url;
        $this->compare_url = $compare_url;
        $this->merges_url = $merges_url;
        $this->archive_url = $archive_url;
        $this->downloads_url = $downloads_url;
        $this->issues_url = $issues_url;
        $this->pulls_url = $pulls_url;
        $this->milestones_url = $milestones_url;
        $this->notifications_url = $notifications_url;
        $this->labels_url = $labels_url;
        $this->releases_url = $releases_url;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->pushed_at = $pushed_at;
        $this->git_url = $git_url;
        $this->ssh_url = $ssh_url;
        $this->clone_url = $clone_url;
        $this->svn_url = $svn_url;
        $this->homepage = $homepage;
        $this->size = $size;
        $this->stargazers_count = $stargazers_count;
        $this->watchers_count = $watchers_count;
        $this->language = $language;
        $this->has_issues = $has_issues;
        $this->has_downloads = $has_downloads;
        $this->has_wiki = $has_wiki;
        $this->has_pages = $has_pages;
        $this->forks_count = $forks_count;
        $this->mirror_url = $mirror_url;
        $this->open_issues_count = $open_issues_count;
        $this->forks = $forks;
        $this->open_issues = $open_issues;
        $this->watchers = $watchers;
        $this->default_branch = $default_branch;
        $this->stargazers = $stargazers;
        $this->master_branch = $master_branch;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->full_name;
    }

    /**
     * @return owner
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @return mixed
     */
    public function getPrivate()
    {
        return $this->private;
    }

    /**
     * @return mixed
     */
    public function getHtmlUrl()
    {
        return $this->html_url;
    }

    /**
     * @return mixed
     */
    public function getDescriptions()
    {
        return $this->descriptions;
    }

    /**
     * @return mixed
     */
    public function getFork()
    {
        return $this->fork;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getForksUrl()
    {
        return $this->forks_url;
    }

    /**
     * @return mixed
     */
    public function getKeysUrl()
    {
        return $this->keys_url;
    }

    /**
     * @return mixed
     */
    public function getCollaboratorsUrl()
    {
        return $this->collaborators_url;
    }

    /**
     * @return mixed
     */
    public function getTeamsUrl()
    {
        return $this->teams_url;
    }

    /**
     * @return mixed
     */
    public function getHooksUrl()
    {
        return $this->hooks_url;
    }

    /**
     * @return mixed
     */
    public function getIssueEventsUrl()
    {
        return $this->issue_events_url;
    }

    /**
     * @return mixed
     */
    public function getEventsUrl()
    {
        return $this->events_url;
    }

    /**
     * @return mixed
     */
    public function getAssigneesUrl()
    {
        return $this->assignees_url;
    }

    /**
     * @return mixed
     */
    public function getBranchesUrl()
    {
        return $this->branches_url;
    }

    /**
     * @return mixed
     */
    public function getTagsUrl()
    {
        return $this->tags_url;
    }

    /**
     * @return mixed
     */
    public function getBlobsUrl()
    {
        return $this->blobs_url;
    }

    /**
     * @return mixed
     */
    public function getGitTagsUrl()
    {
        return $this->git_tags_url;
    }

    /**
     * @return mixed
     */
    public function getGitRefsUrl()
    {
        return $this->git_refs_url;
    }

    /**
     * @return mixed
     */
    public function getTreesUrl()
    {
        return $this->trees_url;
    }

    /**
     * @return mixed
     */
    public function getStatusesUrl()
    {
        return $this->statuses_url;
    }

    /**
     * @return mixed
     */
    public function getLanguagesUrl()
    {
        return $this->languages_url;
    }

    /**
     * @return mixed
     */
    public function getStargazersUrl()
    {
        return $this->stargazers_url;
    }

    /**
     * @return mixed
     */
    public function getContributorsUrl()
    {
        return $this->contributors_url;
    }

    /**
     * @return mixed
     */
    public function getSubscribersUrl()
    {
        return $this->subscribers_url;
    }

    /**
     * @return mixed
     */
    public function getSubscriptionUrl()
    {
        return $this->subscription_url;
    }

    /**
     * @return mixed
     */
    public function getCommitsUrl()
    {
        return $this->commits_url;
    }

    /**
     * @return mixed
     */
    public function getGitCommitsUrl()
    {
        return $this->git_commits_url;
    }

    /**
     * @return mixed
     */
    public function getCommentsUrl()
    {
        return $this->comments_url;
    }

    /**
     * @return mixed
     */
    public function getIssueCommentUrl()
    {
        return $this->issue_comment_url;
    }

    /**
     * @return mixed
     */
    public function getContentsUrl()
    {
        return $this->contents_url;
    }

    /**
     * @return mixed
     */
    public function getCompareUrl()
    {
        return $this->compare_url;
    }

    /**
     * @return mixed
     */
    public function getMergesUrl()
    {
        return $this->merges_url;
    }

    /**
     * @return mixed
     */
    public function getArchiveUrl()
    {
        return $this->archive_url;
    }

    /**
     * @return mixed
     */
    public function getDownloadsUrl()
    {
        return $this->downloads_url;
    }

    /**
     * @return mixed
     */
    public function getIssuesUrl()
    {
        return $this->issues_url;
    }

    /**
     * @return mixed
     */
    public function getPullsUrl()
    {
        return $this->pulls_url;
    }

    /**
     * @return mixed
     */
    public function getMilestonesUrl()
    {
        return $this->milestones_url;
    }

    /**
     * @return mixed
     */
    public function getNotificationsUrl()
    {
        return $this->notifications_url;
    }

    /**
     * @return mixed
     */
    public function getLabelsUrl()
    {
        return $this->labels_url;
    }

    /**
     * @return mixed
     */
    public function getReleasesUrl()
    {
        return $this->releases_url;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @return mixed
     */
    public function getPushedAt()
    {
        return $this->pushed_at;
    }

    /**
     * @return mixed
     */
    public function getGitUrl()
    {
        return $this->git_url;
    }

    /**
     * @return mixed
     */
    public function getSshUrl()
    {
        return $this->ssh_url;
    }

    /**
     * @return mixed
     */
    public function getCloneUrl()
    {
        return $this->clone_url;
    }

    /**
     * @return mixed
     */
    public function getSvnUrl()
    {
        return $this->svn_url;
    }

    /**
     * @return mixed
     */
    public function getHomepage()
    {
        return $this->homepage;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return mixed
     */
    public function getStargazersCount()
    {
        return $this->stargazers_count;
    }

    /**
     * @return mixed
     */
    public function getWatchersCount()
    {
        return $this->watchers_count;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @return mixed
     */
    public function getHasIssues()
    {
        return $this->has_issues;
    }

    /**
     * @return mixed
     */
    public function getHasDownloads()
    {
        return $this->has_downloads;
    }

    /**
     * @return mixed
     */
    public function getHasWiki()
    {
        return $this->has_wiki;
    }

    /**
     * @return mixed
     */
    public function getHasPages()
    {
        return $this->has_pages;
    }

    /**
     * @return mixed
     */
    public function getForksCount()
    {
        return $this->forks_count;
    }

    /**
     * @return mixed
     */
    public function getMirrorUrl()
    {
        return $this->mirror_url;
    }

    /**
     * @return mixed
     */
    public function getOpenIssuesCount()
    {
        return $this->open_issues_count;
    }

    /**
     * @return mixed
     */
    public function getForks()
    {
        return $this->forks;
    }

    /**
     * @return mixed
     */
    public function getOpenIssues()
    {
        return $this->open_issues;
    }

    /**
     * @return mixed
     */
    public function getWatchers()
    {
        return $this->watchers;
    }

    /**
     * @return mixed
     */
    public function getDefaultBranch()
    {
        return $this->default_branch;
    }

    /**
     * @return mixed
     */
    public function getStargazers()
    {
        return $this->stargazers;
    }

    /**
     * @return mixed
     */
    public function getMasterBranch()
    {
        return $this->master_branch;
    }

}