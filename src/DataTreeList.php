<?php
namespace laxertu\DataTree;

use laxertu\DataTree\DataTree;

class DataTreeList extends DataTree
{

    protected $isAList = true;

    /** @var array DataTree */
    private $trees = [];


    final public function addTree(DataTree $tree)
    {
        $index = count($this->getChildren());
        $this->setChild($tree, $index);
    }

}
