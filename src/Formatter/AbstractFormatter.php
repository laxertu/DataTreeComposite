<?php
namespace MessageComposite\Formatter;

use MessageComposite\DataTreeInterface;
use MessageComposite\MessageInterface;

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

    protected function isLeaf(DataTreeInterface $message)
    {
        return !is_null($message->getValue());
    }
}
