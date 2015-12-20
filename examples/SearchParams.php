<?php
namespace MessageComposite\examples;



class SearchParams extends \MessageComposite\Message
{

    protected $name = 'SearchParams';

    /** @var  DateSearchParam */
    private $dateFrom, $dateTo;
    private $boards = [];

    protected $attrs = ['a' => 'b'];


    public function setDateFrom($date)
    {
        $this->dateFrom = $date;
    }

    public function setDateTo($date)
    {
        $this->dateTo = $date;
    }

    public function addBoard($code)
    {
        $this->boards[]=new BoardParam($code);
    }

    protected function prepare()
    {

        $this->addElement(new \MessageComposite\MessageElement('dateFrom', $this->dateFrom));
        $this->addElement(new \MessageComposite\MessageElement('dateTo', $this->dateTo));

        foreach($this->boards as $board) {
            $this->addElement($board);
        }

    }

} 