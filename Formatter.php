<?php
namespace MessageComposite;


interface Formatter
{

    public function buildHead(Message $message);
    public function buildFoot(Message $message);
    public function buildContent(MessageElement $message);

} 