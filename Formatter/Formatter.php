<?php
namespace MessageComposite\Formatter;
use MessageComposite\MessageInterface;


interface Formatter
{

    public function buildContent(MessageInterface $message);

}