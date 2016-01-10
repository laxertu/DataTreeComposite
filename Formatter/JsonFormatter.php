<?php
namespace MessageComposite\Formatter;
use MessageComposite\MessageInterface;

/**
 * Class JsonFormatter
 * @package MessageComposite\Formatter
 * @see MessageComposite\tests\formatters\JsonFormatterTest
 */
class JsonFormatter extends  AbstractFormatter
{

    public function buildContent(MessageInterface $message)
    {

        $content = '"'.$message->getName().'":'.$this->buildBody($message);

        # entire message is surrounded by {}
        if(!$message->getParent()) {
            $content = '{'.$content.'}';
        }
        return $content;
    }

    private function buildBody(MessageInterface $message)
    {

        # a simple value
        if($message->isLeaf()) {

            $content = $this->buildLeafMessageBody($message->getValue());

        } else {

            $content = $this->buildCompositeMessageBody($message->getChildren());

        }

        return $content;
    }

    /**
     * We want to allow clients declaring a message with a valid Json string as content.
     *
     * @param $body
     * @return string
     */
    private function buildLeafMessageBody($messageValue)
    {
        if(is_array($messageValue)) {

            $body = $this->formatArrayValue($messageValue);

        } else {
            $body = $this->formatStringValue($messageValue);
        }

        return $body;
    }

    private function formatStringValue($value)
    {
        #numbers and valid json strings comes without enclosure
        if((@json_decode($value) === null) && !is_numeric($value)){
            $value = '"'.$value.'"';
        }

        return $value;
    }

    private function formatArrayValue($messageValue)
    {

        foreach($messageValue as $index => $value) {
            $messageValue[$index] = $this->formatStringValue($value);
        }

        $body = '['.implode(',', $messageValue).']';
        return $body;
    }



    /**
     * @param MessageInterface[] $message
     * @return array|string
     */
    private function buildCompositeMessageBody(array $children)
    {
        $content = [];
        foreach($children as $child) {
            $content[]= $this->buildContent($child);
        }
        #composites' children are surrounded by {}
        $content = '{'.implode(',', $content).'}';

        return $content;
    }
} 