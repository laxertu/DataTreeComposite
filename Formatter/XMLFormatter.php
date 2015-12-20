<?php
namespace MessageComposite\Formatter;
use MessageComposite\Message;
use MessageComposite\MessageElement;


class XMLFormatter implements Formatter
{
    public function buildHead(Message $message)
    {
        $arr = [];
        $content = $message->getName();
        $attibutes = $message->getAttributes();

        if($attibutes) {
            foreach($attibutes as $name => $value)
            {
                $arr[]=$name.'="'.$value.'"';
            }

            $attrsXML = implode(' ', $arr);
            $content.=' '.$attrsXML;

        }
        $tag = '<'.$content.'>';

        return $tag;
    }

    public function buildFoot(Message $message)
    {

        $tag = '</'.$message->getName().'>';
        return $tag;
    }

    public function buildContent(MessageElement $messageElement)
    {

        if($messageElement->isLeaf()) {

            return '<'.$messageElement->getName().'>'.$messageElement->getValue().'</'.$messageElement->getName().'>';
        } else {

            return $messageElement->getValue();
        }
    }



}