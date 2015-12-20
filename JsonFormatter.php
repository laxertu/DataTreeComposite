<?php
namespace MessageComposite;


class JsonFormatter implements Formatter
{
    public function buildHead(Message $message)
    {

        return '{';
    }

    public function buildFoot(Message $message)
    {
        return '}';
    }

    public function buildContent(MessageElement $message)
    {

        if($message->isLeaf()) {
            return json_encode([$message->getName() => $message->getValue()]);
        } else {

            return $message->getValue();
        }
    }


} 