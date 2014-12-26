<?php namespace Acme;

class UnitParser implements ParsableInterface
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data['basics'];
    }

    public function parse(Number $number)
    {
        $value = $number->getUnits();

        if($number->getTens() == 1)
        {
            $value = $number->getTens() . $value;
        }

        if(array_key_exists($value, $this->data))
        {
            return $this->data[$value];
        }
    }
}
