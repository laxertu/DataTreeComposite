<?php
namespace MessageComposite\examples\auth_protocol;
use MessageComposite\Message;

class ApiMethodBase extends Message
{

    /** @var  AuthNode */
    private $authNode;

    public function __construct(Credentials $credentials)
    {
        $this->authNode = new AuthNode($credentials->getUsr(), $credentials->getPwd());
    }

    protected function prepare()
    {
        $this->addElement($this->authNode);
    }

} 