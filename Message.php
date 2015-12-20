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


    protected function getContent($first = true)
    {
        $this->prepare();
        $formatter = $this->getFormatter();
        $content = '';

        if($first) {
            $content = $formatter->buildHead($this);
        }

        foreach($this->elements as $element) {
            $content.= $formatter->buildContent($element->getContent(false));
        }

        if($first) {
            $content.=$formatter->buildFoot($this);
        }

        return new MessageElement($this->name, $content);
    }

    public final function getBody()
    {
        return $this->getContent()->getValue();
    }

    private function getFormatter()
    {
        if(is_null($this->formatter)) {
            $this->formatter = new Formatter\XMLFormatter();
        }
        return $this->formatter;
    }

} 