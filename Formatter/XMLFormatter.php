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
        if(!$this->haveToBuildHead($message)) {
            $content = $this->buildBody($message);
        } else {
            $content = $this->buildHead($message).$this->buildBody($message).$this->buildFoot($message);
        }
        return $content;
    }

    /**
     * Messages without name and list of values do not have head
     *
     * @param MessageInterface $message
     * @return bool
     */
    private function haveToBuildHead(MessageInterface $message)
    {
        return $message->getName() !== '' && !is_array($message->getValue());
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

        $content = '';
        if($this->isLeaf($message)) {

            $rawContent = $message->getValue();
            if(is_array($rawContent)) {
                foreach($rawContent as $value) {
                    $content .= $this->buildHead($message).$value.$this->buildFoot($message);
                }
            } else {
                $content = $rawContent;
            }



        } else {
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