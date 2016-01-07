<?php
namespace MessageComposite\Formatter;
use MessageComposite\MessageInterface;

/**
 * Class XMLFormatter
 * @package MessageComposite\Formatter
 * @see MessageComposite\tests\formatters\XMLFormatterTest
 */
class XMLFormatter extends AbstractFormatter
{

    public function buildContent(MessageInterface $message)
    {
        return $this->buildHead($message).$this->buildBody($message).$this->buildFoot($message);
    }

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
        $tag = ($this->hasInnerContent($message)) ? '<'.$content.'>' : '<'.$content.' />';

        return $tag;
    }


    private function buildBody(MessageInterface $message)
    {

        if($message->isLeaf()) {

            $content = $message->getBody();

        } else {
            $content = '';
            foreach($message->getChildren() as $child) {
                $content .= $this->buildContent($child);
            }

        }

        return $content;
    }


    private function buildFoot(MessageInterface $message)
    {

        $tag = ($this->hasInnerContent($message)) ? '</'.$message->getName().'>' : '';
        return $tag;
    }


}