<?php
namespace DataTree\Processor;


abstract class AbstractProcessor
{
    /**
     * Tells if a message has some inner content: raw text body or children.
     *
     * @param ProcessableInterface $message
     * @return bool
     */
    protected function hasInnerContent(ProcessableInterface $message)
    {
        $messageValue = $message->getValue();
        return (!is_null($messageValue) && $messageValue !== '') || $message->getChildren();
    }

    /**
     * Tells if a tree is a leaf
     *
     * @param ProcessableInterface $message
     * @return bool
     */
    protected function isLeaf(ProcessableInterface $message)
    {
        return !is_null($message->getValue());
    }
}
