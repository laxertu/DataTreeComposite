<?php
namespace MessageComposite\Formatter;


use MessageComposite\MessageElement;
use MessageComposite\MessageInterface;

class JsonFormatter implements Formatter
{
    public function buildHead(MessageInterface $message)
    {
        return '{"'.$message->getName().'":';
    }

    public function buildBody(MessageInterface $message)
    {
        if($message instanceof MessageElement) {
            return '"'.$message->getBody($this).'"';
        } else {
            return $message->getBody($this);
        }
    }


    public function buildFoot(MessageInterface $message)
    {
        return '}';
    }


} 