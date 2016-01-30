<?php
namespace MessageComposite\Adapter;


use MessageComposite\Formatter\xml\XMLFormattableInterface;
use MessageComposite\xml\MessageInterface;

/**
 * Class ArrayAdapter
 * @package MessageComposite\Adapter
 * @see MessageComposite\tests\adapters\ArrayAdapterTest
 */
class ArrayAdapter
{
    final public function toArray(XMLFormattableInterface $message)
    {

        $object = [];
        $msgName = $message->getName();

        if (is_null($message->getValue())) {
            $object[$msgName] = [];
            foreach ($message->getChildren() as $child) {
                $childName = $child->getName();
                $object[$msgName][$childName] = $this->toArray($child);
            }

        } else {
            if (!$message->getParent()) {
                $object[$msgName] = $message->getValue();
            } else {
                $object = $message->getValue();
            }

        }

        return $object;
    }
}
