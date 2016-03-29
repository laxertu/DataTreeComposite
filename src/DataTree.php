<?php

namespace laxertu\DataTree;
use laxertu\DataTree\xml\NodeElement;

/**
 * Trees with a named set of children.
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
     * Adds a DataTree to children. Childen are inserted ordered
     *
     * @param DataTreeBase $dataTree
     */
    public function addChildTree(DataTreeBase $dataTree)
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
        $this->addChildTree(new DataTreeElement($name, $value));
    }

    public function removeChildTree($name)
    {
        $childrenMapIndex = $this->getIndexByName($name);

        if ($childrenMapIndex === false) {
            throw new \InvalidArgumentException('Unexistent '.$name.' tree name');
        } else {
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
