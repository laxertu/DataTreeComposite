<?php
namespace laxertu\DataTree\Processor;

/**
 * Class StdObjectAdapter
 * @package DataTree\Adapter
 */
class StdObjectAdapter extends AbstractProcessor
{
    final public function toStdObject(ProcessableInterface $tree)
    {

        if ($this->isLeaf($tree)) {
            $result = $this->leafToStdObject($tree);
        } else {
            $result = $this->compositeToStdObject($tree);
        }

        return $result;
    }


    private function compositeToStdObject(ProcessableInterface $tree)
    {
        if ($tree->isAListOfTrees()) {
            return $this->listOfTreesToStdObject($tree);
        } else {
            return $this->namedTreeToStdObject($tree);
        }
    }

    private function listOfTreesToStdObject(ProcessableInterface $tree)
    {

        $result = new \StdClass();
        $treeName = $tree->getName();
        $result->$treeName = [];
        $resultContent = [];
        foreach ($tree->getChildren() as $child) {
            $resultContent[]=$this->toStdObject($child);
        }
        $result->$treeName = $resultContent;
        return $result;
    }

    private function namedTreeToStdObject(ProcessableInterface $tree)
    {

        $result = new \StdClass();
        $msgName = $tree->getName();

        $result->$msgName = new \StdClass();
        foreach ($tree->getChildren() as $child) {
            $childName = $child->getName();
            if (property_exists($result->$msgName, $childName)) {

                $nodeToMove = $result->$msgName->$childName;
                $resultContent = [];
                $resultContent[]=$nodeToMove;
                $leafContent = $this->toStdObject($child);
                $resultContent[]=$leafContent->$childName;

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

    private function leafToStdObject(ProcessableInterface $tree)
    {
        $result = new \StdClass();
        $msgName = $tree->getName();
        $result->$msgName = $tree->getValue();

        return $result;
    }
}
