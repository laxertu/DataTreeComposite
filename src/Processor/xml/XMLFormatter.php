<?php
namespace DataTree\Processor\xml;

use DataTree\Processor\AbstractProcessor;


/**
 * Class XMLFormatter
 * @package DataTree\Formatter
 * @see DataTree\tests\formatters\XMLFormatterTest
 */
class XMLFormatter extends AbstractProcessor
{

    public function buildContent(XMLFormattableInterface $message)
    {
        if (!$this->haveToBuildHead($message)) {
            $content = $this->buildBody($message);
        } else {
            $content = $this->buildHead($message).$this->buildBody($message).$this->buildFoot($message);
        }
        return $content;
    }

    /**
     * Lists of values do not have head
     *
     * @param MessageInterface $message
     * @return bool
     */
    private function haveToBuildHead(XMLFormattableInterface $message)
    {
        return !is_array($message->getValue());
    }

    private function buildHead(XMLFormattableInterface $message)
    {
        $arr = [];
        $content = $message->getName();
        $attibutes = $message->getAttributes();

        if ($attibutes) {
            foreach ($attibutes as $name => $value) {
                $arr[]=$name.'="'.$value.'"';
            }

            $attrsXML = implode(' ', $arr);
            $content.=' '.$attrsXML;

        }
        $tag = ($this->hasInnerContent($message)) ? '<'.$content.'>' : '<'.$content.' />';

        return $tag;
    }


    private function buildBody(XMLFormattableInterface $message)
    {
        if ($this->isLeaf($message)) {
            $content = $this->buildLeafContent($message);
        } else {
            $content = $this->buildCompositeContent($message);
        }

        return $content;
    }

    private function buildLeafContent(XMLFormattableInterface $message)
    {

        $content = '';

        $rawContent = $message->getValue();

        if (is_array($rawContent)) {
            foreach ($rawContent as $value) {
                $content .= $this->buildHead($message).$value.$this->buildFoot($message);
            }
        } else {
            $content = $rawContent;
        }

        return $content;
    }

    private function buildCompositeContent(XMLFormattableInterface $message)
    {
        $content = '';
        foreach ($message->getChildren() as $child) {
            $content .= $this->buildContent($child);
        }
        return $content;
    }


    private function buildFoot(XMLFormattableInterface $message)
    {
        $tag = ($this->hasInnerContent($message)) ? '</'.$message->getName().'>' : '';
        return $tag;
    }
}
