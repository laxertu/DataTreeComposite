<?php
namespace MessageComposite\Formatter;


use MessageComposite\MessageInterface;

abstract class AbstractFormatter implements Formatter
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
        return $message->getValue() || $message->getChildren();
    }

    protected function isASimpleValue(MessageInterface $message)
    {
        return ($message->getName() === '');
    }

} 