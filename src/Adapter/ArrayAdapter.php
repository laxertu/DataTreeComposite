<?php
namespace DataTree\Adapter;


use DataTree\Formatter\xml\XMLFormattableInterface;

/**
 * Class ArrayAdapter
 * @package DataTree\Adapter
 * @see DataTree\tests\adapters\ArrayAdapterTest
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
