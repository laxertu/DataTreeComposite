<?php
namespace MessageComposite\examples;
use MessageComposite\examples\auth_protocol\ApiMethodBase;


class SearchMessage extends ApiMethodBase
{

    /** @var  DateSearchParam */
    private $searchParams;
    protected $name = 'Search';

    public function setDateFrom($date)
    {
        $params = $this->getSearchParams();
        $params->setDateFrom($date);
    }

    public function setDateTo($date)
    {
        $params = $this->getSearchParams();
        $params->setDateTo($date);
    }

    public function addBoard($code)
    {
        $params = $this->getSearchParams();
        $params->addBoard($code);
    }

    private function getSearchParams()
    {
        if(!$this->searchParams) {
            $this->searchParams = new SearchParams();
        }
        return $this->searchParams;
    }


    protected function prepare()
    {
        $this->addElement($this->searchParams);
        $this->attrs['timestamp'] = time();
        $this->attrs['country'] = 'ES';
    }
} 