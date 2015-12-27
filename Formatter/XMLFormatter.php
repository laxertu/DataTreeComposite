<?php
namespace MessageComposite\Formatter;
use MessageComposite\MessageInterface;


class XMLFormatter implements Formatter
{
    private function buildHead(MessageInterface $message)
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

    private function buildFoot(MessageInterface $message)
    {

        $tag = '</'.$message->getName().'>';
        return $tag;
    }

    public function buildContent(MessageInterface $messageElement)
    {
        return $this->buildHead($messageElement).$messageElement->getBody($this).$this->buildFoot($messageElement);
    }



}