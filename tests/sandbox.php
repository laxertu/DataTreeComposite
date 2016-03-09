<?php
namespace laxertu\DataTree\tests;
/**
 * A good place to make experiments
 */
use laxertu\DataTree\Processor\json\JsonFormatter;
use laxertu\DataTree\Processor\ProcessableInterface;
use laxertu\DataTree\Processor\xml\XMLFormatter;
use laxertu\DataTree\Processor\xml\XMLProcessableInterface;
use laxertu\DataTree\xml\GenericMessage;
use laxertu\DataTree\xml\Message;
use laxertu\DataTree\xml\MessageElement;

include('boot.php');

# My system. Let's imagine a book catalog
class MySystemBook
{
    public $title;
    public $author;
    public $ISBN;
    public function __construct($title, $author, $isbn)
    {
        $this->title  = $title;
        $this->author = $author;
        $this->ISBN   = $isbn;
    }
}


class MySystemCatalogue
{
    /** @var  MySystemBook[] */
    public $books;
    public function __construct($books)
    {
        $this->books = $books;
    }
}

# Let's add wrappers to data tree

class BookXMLMessage extends Message
{
    /** @var  MySystemBook */
    private $book;

    public function __construct(MySystemBook $book)
    {
        $this->setName('Book');
        $this->setAttributes(['isbn' => $book->ISBN]);
        $this->setChild(new MessageElement('title', $book->title), 0);
        $this->setChild(new MessageElement('author', $book->author), 1);
    }

}


class CatalogueXMLMessage extends Message
{

    public function __construct(MySystemCatalogue $catalogue)
    {
        foreach ($catalogue->books as $i => $book)
        {
            $this->setChild(new BookXMLMessage($book), $i);
        }
    }

}

# let's make a catalogue
$q     = new MySystemBook('Q', 'Luther Blisset', '123');
$bible = new MySystemBook('The Holy Bible', 'Various', '456');

$mySystemCatalogue = new MySystemCatalogue([$q, $bible]);

# XML generation
$xmlCatalogue = new CatalogueXMLMessage($mySystemCatalogue);

$formatter = new XMLFormatter();
$xml = $formatter->buildContent($xmlCatalogue);

/*
 * $xml contains (but in one single line)
 *
 * <CatalogueXMLMessage>
	<Book isbn="123">
		<title>Q</title>
		<author>Luther Blisset</author>
	</Book>
	<Book isbn="456">
		<title>The Holy Bible</title>
		<author>Various</author>
	</Book>
</CatalogueXMLMessage>
 *
 */
