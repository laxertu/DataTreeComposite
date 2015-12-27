<?php
namespace MessageComposite\Formatter;
use MessageComposite\Message;
use MessageComposite\MessageElement;
use MessageComposite\MessageInterface;


interface Formatter
{
    public function buildContent(MessageInterface $message);
} 