<?php
namespace laxertu\DataTree;

use laxertu\DataTree\DataTree;

/**
 * List of trees implementation
 *
 * Class DataTreeList
 * @package laxertu\DataTree
 */
class DataTreeList extends DataTreeBase
{

    protected $isAList = true;

    final public function addTree(DataTree $tree)
    {
        $index = count($this->getChildren());
        $this->setChild($tree, $index);
    }

}
