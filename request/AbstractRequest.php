<?php
namespace MessageComposite\request;
use MessageComposite\Message;

abstract class AbstractRequest
{

    private $url;

    /** @var Message */
    private $msg;

    public final function __construct(Message $msg)
    {
        $this->msg = $msg;
    }

    public final function getContent()
    {
        $this->prepare();
        return $this->msg->getContent();
    }

    public final function getUrl()
    {
        return $this->url;
    }

    protected function prepare(){}

}