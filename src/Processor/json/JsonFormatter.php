<?php
namespace laxertu\DataTree\Processor\json;

use laxertu\DataTree\Processor\AbstractProcessor;
use laxertu\DataTree\Processor\ProcessableInterface;

/**
 * Class JsonProcessor
 * @package DataTree\Processor
 * @see DataTree\tests\formatters\JsonFormatterTest
 */
class JsonFormatter extends AbstractProcessor
{

    public function buildContent(ProcessableInterface $message)
    {

        $content = '"'.$message->getName().'":'.$this->buildBody($message);

        # entire message is surrounded by {}
        if (!$message->getParent()) {
            $content = '{'.$content.'}';
        }
        return $content;
    }

    private function buildBody(ProcessableInterface $message)
    {

        # a simple value
        if ($this->isLeaf($message)) {

            $content = $this->buildLeafMessageBody($message->getValue());

        } else {

            $content = $this->buildCompositeMessageBody($message->getChildren());

        }

        return $content;
    }

    /**
     * @param $body
     * @return string
     */
    private function buildLeafMessageBody($messageValue)
    {
        if (is_array($messageValue)) {

            $body = $this->formatArrayValue($messageValue);

        } else {
            $body = $this->formatStringValue($messageValue);
        }

        return $body;
    }

    /**
     * @param $value
     * @return string
     */
    private function formatStringValue($value)
    {
        # We want to allow clients to declare a message with a valid Json string as content.
        # Numbers and valid json strings comes without enclosure.
        if ((@json_decode($value) === null) && !is_numeric($value)) {
            $value = '"'.$value.'"';
        }

        return $value;
    }

    private function formatArrayValue($messageValue)
    {

        foreach ($messageValue as $index => $value) {
            $messageValue[$index] = $this->buildLeafMessageBody($value);
        }

        $body = '['.implode(',', $messageValue).']';
        return $body;
    }



    /**
     * @param ProcessableInterface[] $children
     * @return array|string
     */
    private function buildCompositeMessageBody(array $children)
    {
        $content = [];
        foreach ($children as $child) {
            $content[]= $this->buildContent($child);
        }
        #composites' children are surrounded by {}
        $content = '{'.implode(',', $content).'}';

        return $content;
    }
}
