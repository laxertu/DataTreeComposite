<?php
namespace DataTree\Formatter;


interface FormatterInterface
{
    public function buildContent(FormattableInterface $message);
}
