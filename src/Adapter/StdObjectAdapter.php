<?php
namespace DataTree\Adapter;


use DataTree\Formatter\xml\XMLFormattableInterface;

/**
 * Class StdObjectAdapter
 * @package DataTree\Adapter
 * @see DataTree\tests\adapters\StdObjectAdapterTest
 */
class StdObjectAdapter
{
    final public function toStdObject(XMLFormattableInterface $message)
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
