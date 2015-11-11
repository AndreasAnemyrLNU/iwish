<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-10
 * Time: 11:26
 */

namespace controller;


class IndexController
{

    public function doIndex()
    {
        //Init model/object from _POST['payload'] created @ github in a repo.
        $jsonObj = json_decode($_POST['payload']);
        $jsonObjCommits     = $jsonObj->commits[0];
        $jsonObjAuthor      = $jsonObjCommits->author;
        $jsonObjCommitter   = $jsonObjCommits->committer;
        $jsonObjAdded       = $jsonObjCommits->added;
        $jsonObjRemoved     = $jsonObjCommits->removed;
        $jsonObjModified    = $jsonObjCommits->modified;
        $jsonObjHeadCommit  = $jsonObj->head_commit;
        $jsonObjRepository  = $jsonObj->repository;
        $jsonPusher         = $jsonObj->pusher;
        $jsonSender         = $jsonObj->sender;

        $author = new \model\Author
        (
            $jsonObjAuthor->name,
            $jsonObjAuthor->email,
            $jsonObjAuthor->username
        );

        $committer = new\model\Committer
        (
            $jsonObjCommitter->name,
            $jsonObjCommitter->email,
            $jsonObjCommitter->username
        );

        $added = new\model\Added
        (
            $jsonObjAdded
        );

        $removed = new\model\Removed
        (
            $jsonObjRemoved
        );

        $modified = new\model\Modified
        (
            $jsonObjModified
        );

        $commits = new \model\Commits
        (
            $jsonObjCommits->id,
            $jsonObjCommits->distinct,
            $jsonObjCommits->message,
            $jsonObjCommits->timestamp,
            $jsonObjCommits->url,
            $author,
            $committer,
            $added,
            $removed,
            $modified
        );

        $headCommit = new \model\HeadCommit
        (
            $jsonObjHeadCommit->id,
            $jsonObjHeadCommit->distinct,
            $jsonObjHeadCommit->message,
            $jsonObjHeadCommit->timestamp,
            $jsonObjHeadCommit->url,
            $jsonObjHeadCommit->author,
            $jsonObjHeadCommit->name,
            $jsonObjHeadCommit->email,
            $jsonObjHeadCommit->username,
            $jsonObjHeadCommit->committer,
            $jsonObjHeadCommit->added,
            $jsonObjHeadCommit->removed,
            $jsonObjHeadCommit->modified
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
            $jsonSender->following_url
        );


        $payLoadDataGeneratedFromAWebHookAtGithub = new \model\Webhook
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


        file_put_contents('webhook.data', print_r($payLoadDataGeneratedFromAWebHookAtGithub, true));

    }
}

