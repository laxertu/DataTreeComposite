<?php
namespace MessageComposite\examples\auth_protocol;


use MessageComposite\examples\SearchMessage;
use MessageComposite\Formatter\JsonFormatter;
use MessageComposite\Formatter\XMLFormatter;

class SystemSearchModule implements SystemSearchModuleInterface
{
    public function doSearch()
    {


        $credentials = new Credentials();
        $searchMessage = new SearchMessage();

        $searchMessage->setDateFrom('2015-01-02');
        $searchMessage->addBoard('SA');
        $searchMessage->addBoard('AD');

        $protocolMessage = new ProtocolMessage($credentials, $searchMessage);
        $formatter = new XMLFormatter();
        return $protocolMessage->getContent($formatter);

    }
}