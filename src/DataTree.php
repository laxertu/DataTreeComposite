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

        $childrenMapIndex = $this->getIndexByName($name);

        if ($childrenMapIndex === false) {
            $treeIndex = $this->addChild($dataTree);
            $this->childrenMap[$name] = $treeIndex;
        } else {
            $this->setChild($dataTree, $childrenMapIndex);
        }

    }


    private function getIndexByName($name)
    {
        if (array_key_exists($name, $this->childrenMap)) {
            return $this->childrenMap[$name];
        } else {
            return false;
        }
    }


}
