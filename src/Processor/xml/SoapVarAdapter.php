<?php
namespace DataTree\Processor\xml;


use DataTree\Processor\xml\XMLProcessableInterface;

/**
 * Class SoapVarAdapter
 * @package DataTree\Adapter
 * @see DataTree\tests\adapters\SoapVarAdapterTest
 */
class SoapVarAdapter
{

    private $nodeName;

    final public function toSoapVar(XMLProcessableInterface $message)
    {
        $stdObjectAdapter = new StdObjectAdapter();
        $soapVar = new \SoapVar($stdObjectAdapter->toStdObject($message), SOAP_ENC_OBJECT);

        return $soapVar;
    }

}
