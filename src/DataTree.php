<?php

namespace laxertu\DataTree;

/**
 * Trees with a named set of children.
 *
 *
 * Class DataTree
 * @package DataTree
 */

class DataTree extends DataTreeBase
{

    private $childrenMap = [];

    public function setChildTree($name, DataTreeBase $dataTree)
    {

        $treeIndex = $this->getIndex($name);

        if ($treeIndex === false) {
            $treeIndex = $this->generateIndex();
        }

        $this->childrenMap[$name] = $treeIndex;
        $this->setChild($dataTree, $treeIndex);

    }



    private function getIndex($name)
    {
        if (array_key_exists($name, $this->childrenMap)) {
            return $this->childrenMap[$name];
        } else {
            return false;
        }
    }

    private function generateIndex()
    {
        $children = $this->getChildren();
        return ($children) ? count($children) + 1 : 0;
    }

}
