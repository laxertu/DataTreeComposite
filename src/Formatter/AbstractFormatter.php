<?php
namespace DataTree\Formatter;


abstract class AbstractFormatter
{
    /**
     * Tells if a message has some inner content: raw text body or children.
     *
     * @param MessageInterface $message
     * @return bool
     */
    protected function hasInnerContent(FormattableInterface $message)
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
    protected function isLeaf(FormattableInterface $message)
    {
        return !is_null($message->getValue());
    }
}
