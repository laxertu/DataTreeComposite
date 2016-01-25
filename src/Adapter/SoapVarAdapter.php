<?php
namespace MessageComposite\Adapter;


use MessageComposite\MessageInterface;

/**
 * Class SoapVarAdapter
 * @package MessageComposite\Adapter
 * @see MessageComposite\tests\adapters\SoapVarAdapterTest
 */
class SoapVarAdapter
{

    private $nodeName;

    final public function toSoapVar(MessageInterface $message)
    {
        $stdObjectAdapter = new StdObjectAdapter();
        $soapVar = new \SoapVar($stdObjectAdapter->toStdObject($message), SOAP_ENC_OBJECT);

        return $soapVar;
    }

}
