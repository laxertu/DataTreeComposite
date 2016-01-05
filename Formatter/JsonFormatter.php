<?php
namespace MessageComposite\Formatter;


use MessageComposite\MessageElement;
use MessageComposite\MessageInterface;

class JsonFormatter implements Formatter
{
    private function buildHead(MessageInterface $message)
    {
        return '{"'.$message->getName().'":';
    }

    public function buildContent(MessageInterface $message)
    {
        if($message instanceof MessageElement) {
            $body = '"'.$message->getBody($this).'"';
        } else {
            $body = $message->getBody($this);
        }

        return $this->buildHead($message).$body.$this->buildFoot();
    }


    private function buildFoot()
    {
        return '}';
    }


} 