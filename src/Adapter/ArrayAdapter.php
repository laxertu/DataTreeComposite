<?php
namespace MessageComposite\Adapter;


use MessageComposite\MessageInterface;

/**
 * Class StdObjectAdapter
 * @package MessageComposite\Adapter
 * @see MessageComposite\tests\adapters\StdObjectAdapterTest
 */
class ArrayAdapter
{
    final public function toArray(MessageInterface $message)
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
