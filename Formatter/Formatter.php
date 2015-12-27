<?php
namespace MessageComposite\Formatter;
use MessageComposite\Message;
use MessageComposite\MessageElement;


interface Formatter
{

    public function buildHead(Message $message);
    public function buildFoot(Message $message);
    public function buildContent(Message $message);

} 