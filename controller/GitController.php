<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-11
 * Time: 11:59
 */

namespace controller;


class GitController
{
    public function doParse($payload)
    {
        $jsonObj                    = json_decode($payload);
        $jsonObjCommits             = $jsonObj->commits[0];
        $jsonObjCommitsAuthor       = $jsonObjCommits->author;
        $jsonObjCommitsCommitter    = $jsonObjCommits->committer;
        $jsonObjCommitsAdded        = $jsonObjCommits->added;
        $jsonObjCommitsRemoved      = $jsonObjCommits->removed;
        $jsonObjCommitsModified     = $jsonObjCommits->modified;
        $jsonObjHeadCommit          = $jsonObj->head_commit;
        $jsonObjHeadCommitAuthor    = $jsonObjHeadCommit->author;
        $jsonObjHeadCommitCommitter = $jsonObjHeadCommit->committer;
        $jsonObjHeadCommitAdded     = $jsonObjHeadCommit->added;
        $jsonObjHeadCommitRemoved   = $jsonObjHeadCommit->removed;
        $jsonObjHeadCommitModified  = $jsonObjHeadCommit->modified;
        $jsonObjRepository          = $jsonObj->repository;
        $jsonPusher                 = $jsonObj->pusher;
        $jsonSender                 = $jsonObj->sender;

        $commits = new \model\Commits
        (
            $jsonObjCommits->id,
            $jsonObjCommits->distinct,
            $jsonObjCommits->message,
            $jsonObjCommits->timestamp,
            $jsonObjCommits->url,
            new \model\Author
            (
                $jsonObjCommitsAuthor->name,
                $jsonObjCommitsAuthor->email,
                $jsonObjCommitsAuthor->username
            ),
            new \model\Committer
            (
                $jsonObjCommitsCommitter->name,
                $jsonObjCommitsCommitter->email,
                $jsonObjCommitsCommitter->username
            ),
            new\model\Added
            (
                $jsonObjCommitsAdded
            ),
            new\model\Removed
            (
                $jsonObjCommitsRemoved
            ),
            new\model\Modified
            (
                $jsonObjCommitsModified
            )
        );

        $headCommit = new \model\HeadCommit
        (
            $jsonObjHeadCommit->id,
            $jsonObjHeadCommit->distinct,
            $jsonObjHeadCommit->message,
            $jsonObjHeadCommit->timestamp,
            $jsonObjHeadCommit->url,
            new \model\Author
            (
                $jsonObjHeadCommitAuthor->name,
                $jsonObjHeadCommitAuthor->email,
                $jsonObjHeadCommitAuthor->username
            ),
            new \model\Committer
            (
                $jsonObjHeadCommitCommitter->name,
                $jsonObjHeadCommitCommitter->email,
                $jsonObjHeadCommitCommitter->username
            ),
            new \model\Added
            (
                $jsonObjHeadCommitAdded
            ),
            new\model\Removed
            (
                $jsonObjHeadCommitRemoved
            ),
            new\model\Modified
            (
                $jsonObjHeadCommitModified
            )
        );

        $repository = new \model\Repository
        (
            $jsonObjRepository->id,
            $jsonObjRepository->name,
            $jsonObjRepository->full_name,
            new \model\Owner
            (
                $jsonObjRepository->owner->name,
                $jsonObjRepository->owner->email
            ),
            $jsonObjRepository->private,
            $jsonObjRepository->html_url,
            $jsonObjRepository->description,
            $jsonObjRepository->fork,
            $jsonObjRepository->url,
            $jsonObjRepository->forks_url,
            $jsonObjRepository->keys_url,
            $jsonObjRepository->collaborators_url,
            $jsonObjRepository->teams_url,
            $jsonObjRepository->hooks_url,
            $jsonObjRepository->issue_events_url,
            $jsonObjRepository->events_url,
            $jsonObjRepository->assignees_url,
            $jsonObjRepository->branches_url,
            $jsonObjRepository->tags_url,
            $jsonObjRepository->blobs_url,
            $jsonObjRepository->git_tags_url,
            $jsonObjRepository->git_refs_url,
            $jsonObjRepository->trees_url,
            $jsonObjRepository->statuses_url,
            $jsonObjRepository->languages_url,
            $jsonObjRepository->stargazers_url,
            $jsonObjRepository->contributors_url,
            $jsonObjRepository->subscribers_url,
            $jsonObjRepository->subscription_url,
            $jsonObjRepository->commits_url,
            $jsonObjRepository->git_commits_url,
            $jsonObjRepository->comments_url,
            $jsonObjRepository->issue_comment_url,
            $jsonObjRepository->contents_url,
            $jsonObjRepository->compare_url,
            $jsonObjRepository->merges_url,
            $jsonObjRepository->archive_url,
            $jsonObjRepository->downloads_url,
            $jsonObjRepository->issues_url,
            $jsonObjRepository->pulls_url,
            $jsonObjRepository->milestones_url,
            $jsonObjRepository->notifications_url,
            $jsonObjRepository->labels_url,
            $jsonObjRepository->releases_url,
            $jsonObjRepository->created_at,
            $jsonObjRepository->updated_at,
            $jsonObjRepository->pushed_at,
            $jsonObjRepository->git_url,
            $jsonObjRepository->ssh_url,
            $jsonObjRepository->clone_url,
            $jsonObjRepository->svn_url,
            $jsonObjRepository->homepage,
            $jsonObjRepository->size,
            $jsonObjRepository->stargazers_count,
            $jsonObjRepository->watchers_count,
            $jsonObjRepository->language,
            $jsonObjRepository->has_issues,
            $jsonObjRepository->has_downloads,
            $jsonObjRepository->has_wiki,
            $jsonObjRepository->has_pages,
            $jsonObjRepository->forks_count,
            $jsonObjRepository->mirror_url,
            $jsonObjRepository->open_issues_count,
            $jsonObjRepository->forks,
            $jsonObjRepository->open_issues,
            $jsonObjRepository->watchers,
            $jsonObjRepository->default_branch,
            $jsonObjRepository->stargazers,
            $jsonObjRepository->master_branch
        );

        $jsonPusher = new \model\Pusher
        (
            $jsonPusher->name,
            $jsonPusher->email
        );

        $jsonSender = new \model\Sender
        (
            $jsonSender->login,
            $jsonSender->id,
            $jsonSender->avatar_url,
            $jsonSender->gravatar_id,
            $jsonSender->url,
            $jsonSender->html_url,
            $jsonSender->followers_url,
            $jsonSender->following_url,
            $jsonSender->gists_url,
            $jsonSender->starred_url,
            $jsonSender->subscriptions_url,
            $jsonSender->organizations_url,
            $jsonSender->repos_url,
            $jsonSender->events_url,
            $jsonSender->received_events_url,
            $jsonSender->type,
            $jsonSender->site_admin
        );

        $convertedFromJsonToPhp = new \model\Webhook
        (
            $jsonObj->ref,
            $jsonObj->before,
            $jsonObj->after,
            $jsonObj->created,
            $jsonObj->deleted,
            $jsonObj->forced,
            $jsonObj->base_ref,
            $jsonObj->compare,
            $commits,
            $headCommit,
            $repository,
            $jsonPusher,
            $jsonSender
        );

        file_put_contents('data/../data/webhook.data' . $commits->getId(), serialize($convertedFromJsonToPhp));
    }


}