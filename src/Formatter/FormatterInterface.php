<?php
namespace MessageComposite\Formatter;

use MessageComposite\DataTreeInterface;

interface FormatterInterface
{
    public function buildContent(DataTreeInterface $message);
}
