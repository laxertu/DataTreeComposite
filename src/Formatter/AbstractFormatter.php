<?php
namespace DataTree\Formatter;

use DataTree\DataTreeInterface;
use DataTree\MessageInterface;

abstract class AbstractFormatter
{
    /**
     * Tells if a message has some inner content: raw text body or children.
     *
     * @param MessageInterface $message
     * @return bool
     */
    protected function hasInnerContent(DataTreeInterface $message)
    {
        $messageValue = $message->getValue();
        return (!is_null($messageValue) && $messageValue !== '') || $message->getChildren();
    }

    /**
     * Tells if a tree is a leaf
     *
     * @param DataTreeInterface $message
     * @return bool
     */
    protected function isLeaf(DataTreeInterface $message)
    {
        return !is_null($message->getValue());
    }
}
