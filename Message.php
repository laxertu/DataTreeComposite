<?php
namespace MessageComposite;
use MessageComposite\Formatter\Formatter;
use MessageComposite\Formatter\XMLFormatter;

/**
 * Composite implementation
 *
 * Class Message
 * @package MessageComposite
 */
abstract class Message implements MessageInterface
{

    /** @var Message[] */
    private $elements = [];

    protected $name = '';
    protected $attrs = [];

    /**
     * prevents prepare() method to be called twice
     *
     * @var bool
     */
    private $havePrepared = false;

    /**
     * Returns node name
     *
     * @return string
     * @todo default to concrete class name
     */
    public final function getName()
    {
        $this->prepareMessage();
        return $this->name;
    }

    public final function setName($name)
    {
        $this->prepareMessage();
        $this->name = $name;
    }

    public final function getAttributes()
    {
        $this->prepareMessage();
        return $this->attrs;
    }

    public final function setAttributes($attributes)
    {
        $this->attrs = $attributes;
    }

    private function prepareMessage()
    {
        if(!$this->havePrepared) {
            $this->prepare();
            $this->havePrepared = true;
        }

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

    protected function addElement(MessageInterface $element)
    {
        $this->elements[]=$element;
    }

    public function getBody(Formatter $formatter)
    {
        $this->prepareMessage();
        $content = '';

        foreach($this->elements as $element) {
            $content.= $formatter->buildContent($element);
        }

        return $content;
    }

} 