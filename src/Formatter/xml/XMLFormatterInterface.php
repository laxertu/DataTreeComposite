<?php
namespace MessageComposite\Formatter\xml;

interface XMLFormatterInterface
{
    public function buildContent(XMLFormattableInterface $message);
}
