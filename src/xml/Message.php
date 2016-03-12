<?php
namespace laxertu\DataTree\xml;



use laxertu\DataTree\Processor\xml\XMLMessageInterface;

abstract class Message extends Node implements XMLMessageInterface
{

    private $version  = XMLConstants::VERSION_1_0;
    private $encoding = XMLConstants::UTF8;

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
