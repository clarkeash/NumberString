<?php namespace Acme;

class HundredsParser implements ParsableInterface
{
    public function __construct($data)
    {
        $this->data = $data;
        $this->unitParser = new UnitParser($data);
    }

    public function parse(Number $number)
    {
        $count = (new NumberMapper)->parse($number->getHundreds());
        return $count . ' ' . $this->data['hundred'];
    }
}
