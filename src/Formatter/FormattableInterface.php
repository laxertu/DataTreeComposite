<?php
namespace MessageComposite\Formatter;


interface FormattableInterface
{

    public function getName();

    /**
     * Message raw content as array or raw text, null for composites.
     *
     * @var null | array | String
     */
    public function getValue();

    /**
     * @return DataTreeInterface[]
     */
    public function getChildren();

    /**
     * @return DataTreeInterface
     */
    public function getParent();
}
