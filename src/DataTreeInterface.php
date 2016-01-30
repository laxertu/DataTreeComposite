<?php
namespace MessageComposite;


interface DataTreeInterface
{
    public function setName($name);

    /**
     * @param DataTreeInterface $parent
     */
    public function setParent(DataTreeInterface $parent);


    /**
     * Sets a Message raw value
     *
     * @param $value String | array
     */
    public function setValue($value = '');

}
