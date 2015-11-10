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
        $jsonObjCommits     = $jsonObj->        commits[0];
        $jsonObjAuthor      = $jsonObjCommits-> author;
        $jsonObjCommitter   = $jsonObjCommits-> committer;
        $jsonObjAdded       = $jsonObjCommits-> added[0];
        $jsonObjRemoved     = $jsonObjCommits-> removed[0];
        $jsonObjModified    = $jsonObjCommits-> removed[0];
        $jsonObjRepository  = $jsonObj->        repository;

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


        $repository = new \model\Repository
        (
            $jsonObjRepository->id,
            $jsonObjRepository->name,
            $jsonObjRepository->full_name,
            new \model\Owner
            (
                $jsonObjRepository->owner->name,
                $jsonObjRepository->owner->email
            )
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
            // TODO -> No parsing fixed. Just parsting string but not obj init...
            $jsonObj->head_commit,
            $repository,
            $jsonObj->pusher,
            $jsonObj->sender
        );


        file_put_contents('webhook.data', print_r($payLoadDataGeneratedFromAWebHookAtGithub, true));

    }
}

