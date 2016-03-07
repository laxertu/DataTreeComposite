<?php
namespace laxertu\DataTree\Processor;


abstract class AbstractProcessor
{
    /**
     * Tells if a processable has some inner content: value or children.
     *
     * @param ProcessableInterface $message
     * @return bool
     */
    protected function hasInnerContent(ProcessableInterface $processableInterface)
    {
        $messageValue = $processableInterface->getValue();
        return (!is_null($messageValue) && $messageValue !== '') || $processableInterface->getChildren();
    }

    /**
     * Tells if a tree is a leaf
     *
     * @param ProcessableInterface $message
     * @return bool
     */
    protected function isLeaf(ProcessableInterface $processableInterface)
    {
        return !$processableInterface->getChildren();
    }
}
