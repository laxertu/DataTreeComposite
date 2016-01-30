<?php
namespace MessageComposite\Formatter;


interface FormatterInterface
{
    public function buildContent(FormattableInterface $message);
}
