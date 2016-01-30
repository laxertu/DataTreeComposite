<?php
namespace DataTree\Formatter\xml;

interface XMLFormatterInterface
{
    public function buildContent(XMLFormattableInterface $message);
}
