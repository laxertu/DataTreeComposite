<?php
namespace DataTree\Adapter;

use DataTree\Formatter\AbstractFormatter;
use DataTree\Formatter\xml\XMLFormattableInterface;

/**
 * Class ArrayAdapter
 * @package DataTree\Adapter
 *
 *
 * When some tree with multiple children with same name is processed, childen are returned as a numeric array, when
 * only one is present, it will be returned as associative. @see DataTree\tests\adapters\ArrayAdapterTest
 *
 */
class ArrayAdapter extends AbstractFormatter
{
    final public function toArray(XMLFormattableInterface $xmlTree)
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

    private function compositeToArray(XMLFormattableInterface $xmlTree)
    {

        $result = [];
        $msgName = $xmlTree->getName();

        $result[$msgName] = [];
        foreach ($xmlTree->getChildren() as $child) {
            $chldName = $child->getName();
            if (array_key_exists($chldName, $result[$msgName])) {

                $nodeToMove = $result[$msgName][$chldName];
                $result[$msgName][$chldName] = [];
                $result[$msgName][$chldName][]=$nodeToMove;
                $leafContent = $this->toArray($child);
                $result[$msgName][$chldName][]=$leafContent[$chldName];

            } else {
                $result[$msgName] = array_merge($result[$msgName], $this->toArray($child));
            }
        }

        return $result;
    }

    private function leafToArray(XMLFormattableInterface $xmlTree)
    {

        return [$xmlTree->getName() => $xmlTree->getValue()];
    }
}
