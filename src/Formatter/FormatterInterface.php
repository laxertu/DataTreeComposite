<?php
namespace MessageComposite\Formatter;

use MessageComposite\MessageInterface;

interface FormatterInterface
{
    public function buildContent(MessageInterface $message);
}
