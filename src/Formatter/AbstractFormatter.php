<?php
namespace MessageComposite\Formatter;

use MessageComposite\MessageInterface;

abstract class AbstractFormatter implements FormatterInterface
{
    abstract public function buildContent(MessageInterface $message);

    /**
     * Tells if a message has some inner content: raw text body or children.
     *
     * @param MessageInterface $message
     * @return bool
     */
    protected function hasInnerContent(MessageInterface $message)
    {
        $messageValue = $message->getValue();
        return (!is_null($messageValue) && $messageValue !== '') || $message->getChildren();
    }

    protected function isLeaf(MessageInterface $message)
    {
        return !is_null($message->getValue());
    }
}
