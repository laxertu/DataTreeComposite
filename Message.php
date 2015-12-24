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

    /**
     * Classes that inherits from MessageElement have this property setted to true. A formatter
     * may need it to build content in some different way
     *
     * @var bool
     */
    protected $isLeaf = false;

    public final function isLeaf()
    {
        return $this->isLeaf;
    }

    /**
     * Returns node name
     *
     * @return string
     * @todo default to concrete class name
     */
    public final function getName()
    {
        return $this->name;
    }

    public final function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Return an associative array in a key => value form with attributes
     *
     * @return array
     */
    public final function getAttributes()
    {
        return $this->attrs;
    }

    /**
     * Child classes that needs some special behaviour before getting content can implement this method.
     *
     *
     * This method is declared as protected as often we want to give control about how a message is structured to
     * message itself. If you want more flexibility you have to extend GenericMessage. See examples
     *
     * @see GenericMessage
     */
    protected function prepare() {}

    protected function addElement(Message $element)
    {
        $this->elements[]=$element;
    }

    /**
     * Returns a MessageElement object with message plain text content (without head and foot)
     *
     * @return MessageElement
     */
    public function getBody()
    {
        $this->prepare();
        $content = '';

        foreach($this->elements as $element) {
            $content.= $element->getContent();
        }

        return new MessageElement($this->name, $content);
    }

    /**
     * Returns full message content
     *
     * @return string
     */
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