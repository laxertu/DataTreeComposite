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

    public function setChildElement($name, $value)
    {
        $this->setChildTree($name, new DataTreeElement($name, $value));
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
