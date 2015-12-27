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

    public final function getAttributes()
    {
        return $this->attrs;
    }

    public final function setAttributes($attributes)
    {
        $this->attrs = $attributes;
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
        $content = '';
        $this->prepare();

        foreach($this->elements as $element) {
            $content.= $element->getContent($formatter);
        }

        return $content;
    }

    public final function getContent(Formatter $formatter)
    {

        return $formatter->buildHead($this).$this->getBody($formatter).$formatter->buildFoot($this);

    }

} 