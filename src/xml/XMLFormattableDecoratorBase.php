<?php
namespace DataTree\xml;

use DataTree\Processor\xml\XMLProcessableInterface;

/**
 * Class XMLFormattableDecoratorBase
 * @package DataTree\xml
 * @see DataTree\examples\auth_based_protocol\ProtocolMessage
 */
abstract class XMLFormattableDecoratorBase implements XMLProcessableInterface
{

    /** @var  XMLFormattableInterface */
    private $xmlFormattable;

    public function __construct(XMLProcessableInterface $xmlFormattable)
    {
        $this->xmlFormattable = $xmlFormattable;
    }

    public function isLeaf()
    {
        return $this->xmlFormattable->isLeaf();
    }


    protected function getXMLFormattable()
    {
        return $this->xmlFormattable;
    }

    protected function setXMLFormattable(XMLProcessableInterface $formattableInterface)
    {
        $this->xmlFormattable = $formattableInterface;
    }

    public function getName()
    {
        return $this->xmlFormattable->getName();
    }

    public function getAttributes()
    {
        return $this->xmlFormattable->getAttributes();
    }


    public function getValue()
    {
        return $this->xmlFormattable->getValue();
    }

    public function getChildren()
    {
        return $this->xmlFormattable->getChildren();
    }


    public function getParent()
    {
        return $this->xmlFormattable->getParent();
    }

}
