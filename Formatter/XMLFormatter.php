<?php
namespace MessageComposite\Formatter;
use MessageComposite\MessageInterface;


class XMLFormatter implements Formatter
{
    public function buildHead(MessageInterface $message)
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
        $tag = ($message->getBody($this)) ? '<'.$content.'>' : '<'.$content.' />';

        return $tag;
    }

    public function buildBody(MessageInterface $message)
    {
        return $message->getBody($this);
    }


    public function buildFoot(MessageInterface $message)
    {

        $tag = ($message->getBody($this)) ? '</'.$message->getName().'>' : '';
        return $tag;
    }


}