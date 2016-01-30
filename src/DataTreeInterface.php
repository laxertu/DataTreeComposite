<?php
namespace MessageComposite;

/**
 * Contract for data trees. Provides only basic funcionalities: setting name, value and place into other tree.
 *
 * Interface DataTreeInterface
 * @package MessageComposite
 */
interface DataTreeInterface
{
    /**
     * @param $name String
     * @return mixed
     */
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
