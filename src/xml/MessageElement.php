<?php
namespace MessageComposite\xml;

/**
 * Leaf classes.
 *
 * Class MessageElement
 * @package MessageComposite
 */
class MessageElement extends Message
{

    /**
     * @param $name
     * @param string $value
     * @throws \InvalidArgumentException
     */
    final public function __construct($name, $value = '')
    {
        try {
            $this->setName($name);
            $this->setValue($value);
        } catch (\InvalidArgumentException $e) {
            throw $e;
        }
    }

    final protected function setChild(MessageInterface $element, $pos)
    {
        throw new \Exception('MessageElement objects does not have children');
    }

    final protected function removeElement($pos)
    {
        throw new \Exception('MessageElement objects does not have children');
    }
}
