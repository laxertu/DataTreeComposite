<?php
namespace DataTree\examples\auth_based_protocol;

class Credentials
{

    private $usr = 'USR';
    private $pwd = 'PWD';

    public function getUsr()
    {
        return $this->usr;
    }

    public function getPwd()
    {
        return $this->pwd;
    }
}
