<?php namespace Acme;

class HundredsParser extends BaseParser implements ParsableInterface
{
    public function parse(Number $number)
    {
        $count = (new NumberMapper)->parse($number->getHundreds());
        return $count . ' ' . $this->data['hundred'];
    }
}
