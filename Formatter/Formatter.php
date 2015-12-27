<?php
namespace MessageComposite\Formatter;
use MessageComposite\Message;
use MessageComposite\MessageElement;


interface Formatter
{
    public function buildContent(Message $message);
} 