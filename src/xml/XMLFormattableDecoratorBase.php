<?php
namespace DataTree\xml;

use DataTree\Processor\xml\XMLFormattableInterface;

/**
 * Class XMLFormattableDecoratorBase
 * @package DataTree\xml
 * @see DataTree\examples\auth_based_protocol\ProtocolMessage
 */
abstract class XMLFormattableDecoratorBase implements XMLFormattableInterface
{

    /** @var  XMLFormattableInterface */
    private $xmlFormattable;

    public function __construct(XMLFormattableInterface $xmlFormattable)
    {
        $this->xmlFormattable = $xmlFormattable;
    }

    protected function getXMLFormattable()
    {
        return $this->xmlFormattable;
    }

    protected function setXMLFormattable(XMLFormattableInterface $formattableInterface)
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
