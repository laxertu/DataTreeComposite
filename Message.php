<?php
namespace MessageComposite;

/**
 * Composite implementation
 *
 * Class Message
 * @package MessageComposite
 */
abstract class Message {

    /** @var Message[] */
    private $elements = [];

    protected $name = '';
    protected $attrs = [];

    /** @var  Formatter */
    private $formatter;

    protected $isLeaf = false;

    public final function isLeaf()
    {
        return $this->isLeaf;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAttributes()
    {
        return $this->attrs;
    }

    protected function prepare() {}

    protected function addElement(Message $element)
    {
        $this->elements[]=$element;
    }


    protected function getBody()
    {
        $this->prepare();
        $content = '';

        foreach($this->elements as $element) {
            $content.= $element->getContent();
        }

        return new MessageElement($this->name, $content);
    }

    public final function getContent()
    {
        $formatter = $this->getFormatter();
        return $formatter->buildHead($this).$this->getBody()->getValue().$formatter->buildFoot($this);
    }

    private function getFormatter()
    {
        if(is_null($this->formatter)) {
            $this->formatter = new Formatter\XMLFormatter();
        }
        return $this->formatter;
    }

} 