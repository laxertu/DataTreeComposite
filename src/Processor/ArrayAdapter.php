<?php
namespace laxertu\DataTree\Processor;

use laxertu\DataTree\DataTree;
use laxertu\DataTree\DataTreeList;
use laxertu\DataTree\Processor\AbstractProcessor;
use laxertu\DataTree\Processor\ProcessableInterface;

/**
 * Class ArrayAdapter
 * @package DataTree\Adapter
 *
 *
 * When some tree with multiple children with same name is processed, childen are returned as a numeric array, when
 * only one is present, it will be returned as associative.
 * Useful for SOAP.
 *
 */
class ArrayAdapter extends AbstractProcessor
{
    final public function toArray(ProcessableInterface $tree)
    {

        if ($this->isLeaf($tree)) {
            $result = $this->leafToArray($tree);
        } else {
            $result = $this->compositeToArray($tree);
        }

        return $result;
    }

    private function compositeToArray(ProcessableInterface $tree)
    {
        if ($tree->isAListOfTrees()) {
            return $this->listOfTreesToArray($tree);
        } else {
            return $this->namedCompositeToArray($tree);
        }
    }

    private function listOfTreesToArray(DataTreeList $list)
    {

        $listName = $list->getName();
        $result = [$listName => []];
        foreach ($list->getChildren() as $child) {
            $result[$listName][]=$this->toArray($child);
        }
        return $result;
    }

    private function namedCompositeToArray(DataTree $tree)
    {
        $result = [];
        $msgName = $tree->getName();

        $result[$msgName] = [];
        foreach ($tree->getChildren() as $child) {
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

    private function leafToArray(ProcessableInterface $tree)
    {

        return [$tree->getName() => $tree->getValue()];
    }
}
