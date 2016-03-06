<?php
namespace laxertu\DataTree\Processor\xml;

use laxertu\DataTree\Processor\AbstractProcessor;
use laxertu\DataTree\Processor\xml\XMLProcessableInterface;

/**
 * Class ArrayAdapter
 * @package DataTree\Adapter
 *
 *
 * When some tree with multiple children with same name is processed, childen are returned as a numeric array, when
 * only one is present, it will be returned as associative.
 * Useful for SOAP. @see DataTree\tests\adapters\ArrayAdapterTest
 *
 */
class ArrayAdapter extends AbstractProcessor
{
    final public function toArray(XMLProcessableInterface $xmlTree)
    {

        $result = [];
        $msgName = $xmlTree->getName();

        if ($this->isLeaf($xmlTree)) {
            $result = $this->leafToArray($xmlTree);
        } else {
            $result = $this->compositeToArray($xmlTree);
        }

        return $result;
    }

    private function compositeToArray(XMLProcessableInterface $xmlTree)
    {

        $result = [];
        $msgName = $xmlTree->getName();

        $result[$msgName] = [];
        foreach ($xmlTree->getChildren() as $child) {
            $childName = $child->getName();
            if (array_key_exists($childName, $result[$msgName])) {

                $nodeToMove = $result[$msgName][$childName];
                $result[$msgName][$childName] = [];
                $result[$msgName][$childName][]=$nodeToMove;
                $leafContent = $this->toArray($child);
                $result[$msgName][$childName][]=$leafContent[$childName];

            } else {
                $result[$msgName] = array_merge($result[$msgName], $this->toArray($child));
            }
        }

        return $result;
    }

    private function leafToArray(XMLProcessableInterface $xmlTree)
    {

        return [$xmlTree->getName() => $xmlTree->getValue()];
    }
}
