<?php
namespace MessageComposite\Formatter;
use MessageComposite\Message;
use MessageComposite\MessageElement;


class XMLFormatter implements Formatter
{
    private function buildHead(Message $message)
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

    private function buildFoot(Message $message)
    {

        $tag = '</'.$message->getName().'>';
        return $tag;
    }

    public function buildContent(Message $messageElement)
    {
        return $this->buildHead($messageElement).$messageElement->getBody($this).$this->buildFoot($messageElement);
    }



}