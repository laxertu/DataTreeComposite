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

    public function __construct($name = false)
    {
        if ($name !== false) {
            $this->setName($name);
        }
    }

    final public function addTree(DataTreeBase $tree)
    {
        $this->addChild($tree);
    }

}
