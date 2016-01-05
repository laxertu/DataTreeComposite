<?php
namespace MessageComposite\Formatter;
use MessageComposite\MessageInterface;


interface Formatter
{
    public function buildHead(MessageInterface $message);
    public function buildFoot(MessageInterface $message);
} 