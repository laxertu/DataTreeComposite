<?php
namespace MessageComposite\examples\auth_protocol;


use MessageComposite\examples\SearchMessage;
use MessageComposite\examples\SearchParams;

class SystemSearchModule implements SystemSearchModuleInterface
{
    public function doSearch()
    {


        $credentials = new Credentials();
        $searchMessage = new SearchMessage();
        $searchMessage->setDateFrom('2015-01-02');
        $searchMessage->addBoard('SA');
        $searchMessage->addBoard('AD');

        $message = new ProtocolMessage($credentials, $searchMessage);
        return $message->getContent();

    }
}