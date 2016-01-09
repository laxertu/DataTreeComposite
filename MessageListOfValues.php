<?php
namespace MessageComposite;

/**
 * Encapsulates list of values, e.g. <val>1</val><val>2</val>
 *
 * Class MessageListOfValues
 * @package MessageComposite
 */
class MessageListOfValues extends Message
{

    /** @var  val node name */
    private $valName;

    public function __construct($valName, array $values = [])
    {
        $this->valName = $valName;
        # sets message a nameless one, see method documentation
        $this->setName('');
        $this->setValues($values);
    }

    public function setValues(array $values)
    {
        $pos = 0;
        foreach($values as $value)
        {
            $element = new MessageElement($this->valName, $value);
            $this->setElement($element, $pos);
            $pos++;
        }
    }
} 