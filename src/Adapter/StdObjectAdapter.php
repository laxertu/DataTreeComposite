<?php
namespace DataTree\Adapter;


use DataTree\Formatter\AbstractFormatter;
use DataTree\Formatter\xml\XMLFormattableInterface;

/**
 * Class StdObjectAdapter
 * @package DataTree\Adapter
 * @see DataTree\tests\adapters\StdObjectAdapterTest
 */
class StdObjectAdapter extends AbstractFormatter
{
    final public function toStdObject(XMLFormattableInterface $xmlTree)
    {

        $result = new \StdClass();
        $msgName = $xmlTree->getName();

        if ($this->isLeaf($xmlTree)) {
            $result = $this->leafToStdObject($xmlTree);
        } else {
            $result = $this->compositeToStdObject($xmlTree);
        }

        return $result;
    }


    private function compositeToStdObject(XMLFormattableInterface $xmlTree)
    {

        $result = new \StdClass();
        $msgName = $xmlTree->getName();

        $result->$msgName = new \StdClass();
        foreach ($xmlTree->getChildren() as $child) {
            $childName = $child->getName();
            if (property_exists($result->$msgName, $childName)) {
                $nodeToMove = $result->$msgName->$childName;
                $resultContent = [];
                $resultContent[]=$nodeToMove;
                $leafContent = $this->toStdObject($child);
                $resultContent[]=$leafContent;

                $result->$msgName->$childName = $resultContent;

            } else {
                $result->$msgName = $this->mergeObjects($result->$msgName, $this->toStdObject($child));
            }
        }

        return $result;
    }

    private function mergeObjects(\StdClass $o1, \StdClass $o2)
    {
        foreach (get_object_vars($o2) as $name => $value) {
            $o1->$name = $value;
        }

        return $o1;
    }

    private function leafToStdObject(XMLFormattableInterface $xmlTree)
    {
        $result = new \StdClass();
        $msgName = $xmlTree->getName();
        $result->$msgName = $xmlTree->getValue();

        return $result;
    }
}
