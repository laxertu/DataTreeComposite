<?php
namespace MessageComposite\examples\auth_protocol;
use MessageComposite\examples\auth_protocol\AuthNode;
use MessageComposite\Message;

class ApiMethodBase extends Message
{

    /** @var  AuthNode */
    private $authNode;


    public function setAuthNode(AuthNode $node)
    {
        $this->authNode = $node;
    }

} 