<?php namespace Acme;

class ThousandsParser implements ParsableInterface
{
    protected $data;
    protected $unitParser;

    public function __construct($data)
    {
        $this->data = $data;

        $this->unitParser = new UnitParser($data);
    }

    public function parse(Number $number)
    {
        $count = (new NumberMapper)->parse($number->getThousands());
        return $count . ' ' . $this->data['thousand'];
    }
}
