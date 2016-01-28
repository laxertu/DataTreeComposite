<?php
namespace MessageComposite\Formatter\xml;

use MessageComposite\xml\MessageInterface;

interface XMLFormatterInterface
{
    public function buildContent(MessageInterface $message);
}
