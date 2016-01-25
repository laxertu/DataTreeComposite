<?php
namespace MessageComposite\Adapter;


use MessageComposite\MessageInterface;

/**
 * Class StdObjectAdapter
 * @package MessageComposite\Adapter
 * @see MessageComposite\tests\adapters\StdObjectAdapterTest
 */
class StdObjectAdapter
{
    final public function toStdObject(MessageInterface $message)
    {

        $object = new \StdClass();
        $msgName = $message->getName();

        if (is_null($message->getValue())) {
            $object->$msgName = new \StdClass();
            foreach ($message->getChildren() as $child) {
                $childName = $child->getName();
                $object->$msgName->$childName = $this->toStdObject($child);
            }

        } else {
            if (!$message->getParent()) {
                $object->$msgName = $message->getValue();
            } else {
                $object = $message->getValue();
            }

        }

        return $object;
    }
}
