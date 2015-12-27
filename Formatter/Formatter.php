<?php
namespace MessageComposite\Formatter;
use MessageComposite\Message;
use MessageComposite\MessageElement;
use MessageComposite\MessageInterface;


interface Formatter
{
    public function buildContent(MessageInterface $message);
    public function buildHead(MessageInterface $message);
    public function buildFoot(MessageInterface $message);
} 