<?php namespace Acme;

class TensParser extends BaseParser implements ParsableInterface
{
    public function __construct($data)
    {
        $this->data = $data['tens'];
    }

    public function parse(Number $number)
    {
        if($number->getTens() > 1)
        {
            $rounded = $number->getTens() * 10;
            return $this->data[$rounded];
        }
    }
}
