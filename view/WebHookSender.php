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
    private $m_visible;
    private $m_sender;
    private $m_nav;
    private $m_sha;
    private $m_formId;

    public function __construct(\model\Sender $s, \view\Navigation $n, $sha)
    {
        $this->m_sender = $s;
        $this->m_nav = $n;
        $this->m_sha = $sha;
        $this->m_formId = 'view::webhooksender' . $sha;
        $this->m_visible = $this->m_nav->IsVisibilityTrueOrFalse($this->m_formId);

        $this->getHTML();
    }

    public function getHTML()
    {
        if(!$this->m_visible)
            return $this->m_nav->RenderFormThatCanToggleVisibility
            ('S E N D E R - - - S H O W', $this->m_visible, $this->m_sha, $this->m_formId);
        if($this->m_visible)
            $toggle = '';
            $toggle =  $this->m_nav->RenderFormThatCanToggleVisibility
            ('S E N D E R - - - H I D E', $this->m_visible, $this->m_sha, $this->m_formId);

        return
        "
         <div class='well'>
             <h4 class='h4'>Sender</h4>
             {$toggle}
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






