<?php
namespace laxertu\DataTree\xml;



abstract class Message extends Node
{

    private $version;
    private $encoding;

    public function setEncoding($encodind)
    {
        $this->encoding = $encodind;
    }

    public function getEncoding()
    {
        return $this->encoding;
    }

    public function setVersion($version)
    {
        $this->version = $version;
    }

    public function getVersion()
    {
        return $this->version;
    }


}
