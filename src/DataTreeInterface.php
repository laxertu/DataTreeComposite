<?php
namespace MessageComposite;


interface DataTreeInterface
{

    public function getName();
    public function setName($name);

    /**
     * Message raw content as array or raw text, null for composites.
     *
     * @var null | array | String
     */
    public function getValue();

    /**
     * @return MessageInterface[]
     */
    public function getChildren();

    /**
     * @param MessageInterface $parent
     */
    public function setParent(DataTreeInterface $parent);

    /**
     * @return MessageInterface
     */
    public function getParent();
}
