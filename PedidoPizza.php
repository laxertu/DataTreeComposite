<?php


namespace MessageComposite;


class PedidoPizza extends Message
{

    protected $name = 'Pedidopizza';

    private $codigoPizza;
    private $cantidad;

    public function __construct($codigo, $num)
    {

        $this->codigoPizza = $codigo;
        $this->cantidad = $num;
    }

    protected function prepare()
    {

        $this->addElement(new MessageElement('codigo', $this->codigoPizza));
        $this->addElement(new MessageElement('numero', $this->cantidad));

    }

} 