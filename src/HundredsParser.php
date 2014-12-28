<?php namespace Acme;

class HundredsParser implements ParsableInterface
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function parse(Number $number)
    {
        $count = (new NumberMapper)->parse($number->getHundreds());
        return $count . ' ' . $this->data['hundred'];
    }
}
