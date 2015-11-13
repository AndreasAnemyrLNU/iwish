<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-13
 * Time: 00:29
 */

namespace view;


class WebHookSender
{
    private $m_sender;

    /**
     * WebHookSender constructor.
     * @param \model\Sender $cs
     */
    public function __construct(\model\Sender $s)
    {
        $this->m_sender = $s;
        $this->getHTML();
    }

    public function getHTML()
    {
        return
        "
         <div class='panel panel-body>
             <h4 class='h4'>Sender</h4>
             <dl class='dl-horizontal'>
                <dt>Login: </dt>
                    <dd>{$this->m_sender->getLogin()}</dd>
                <dt>Id: </dt>
                    <dd>{$this->m_sender->getId()}</dd>
                <dt>Avatar Url: </dt>
                    <dd>{$this->m_sender->getAvatarUrl()}</dd>
                <dt>Gravatar Id: </dt>
                    <dd>{$this->m_sender->getGravatarId()}</dd>
                <dt>Url: </dt>
                    <dd>{$this->m_sender->getUrl()}</dd>
                 <dt>Html Url </dt>
                    <dd>{$this->m_sender->getHtmlUrlprivate()}</dd>
                <dt>Followers Url: </dt>
                    <dd>{$this->m_sender->getFollowersUrl()}</dd>
                <dt>Following Url: </dt>
                    <dd>{$this->m_sender->getFollowingUrl()}</dd>
                <dt>Gists Url: </dt>
                    <dd>{$this->m_sender->getGistsUrl()}</dd>
                <dt>Starred Url: </dt>
                    <dd>{$this->m_sender->getStarredUrl()}</dd>
                <dt>Subscriptions Url: </dt>
                    <dd>{$this->m_sender->getSubscriptionsUrl()}</dd>
                <dt>Organizations Url:</dt>
                    <dd>{$this->m_sender->getOrganizationsUrl()}</dd>
                <dt>Repos Url: </dt>
                    <dd>{$this->m_sender->getReposUrl()}</dd>
                <dt>Events Url: </dt>
                    <dd>{$this->m_sender->getEventsUrl()}</dd>
                <dt>Received Events Url: </dt>
                    <dd>{$this->m_sender->getReceivedEventsUrl()}</dd>
             </dl>
         </div>
         ";
    }
}






