<?php

namespace laxertu\DataTree;
use laxertu\DataTree\xml\NodeElement;

/**
 * Trees where children are indexed by name. @see DataTree::setChildTree
 *
 *
 * Class DataTree
 * @package DataTree
 * @see laxertu\DataTree\tests\generic\DataTreeTest
 */

class DataTree extends DataTreeBase
{

    private $childrenMap = [];

    /**
     * Sets a DataTree as child. Children are returned in same order as first insertion.
     * If composite already have a child with same name it will be overwritten
     *
     * @param DataTreeBase $dataTree
     * @param string $placeMark if you want tree to be assigned to other key
     *
     */
    public function setChildTree(DataTreeBase $dataTree)
    {

        $name = $dataTree->getName();
        $childrenMapIndex = $this->getIndexByName($name);

        if ($childrenMapIndex === false) {
            $treeIndex = $this->addChild($dataTree);
            $this->childrenMap[$name] = $treeIndex;
        } else {
            $this->setChild($dataTree, $childrenMapIndex);
        }

    }

    public function setChildElement($name, $value)
    {
        $this->setChildTree(new DataTreeElement($name, $value));
    }

    public function removeChildTree($name)
    {
        $childrenMapIndex = $this->getIndexByName($name);

        if ($childrenMapIndex === false) {
            throw new \InvalidArgumentException('Unexistent '.$name.' tree name');
        } else {
            unset($this->childrenMap[$name]);
            $this->removeChild($childrenMapIndex);
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
