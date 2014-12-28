<?php namespace Acme;

class ThousandsParser extends BaseParser implements ParsableInterface
{
    public function parse(Number $number)
    {
        $count = (new NumberMapper)->parse($number->getThousands());
        return $count . ' ' . $this->data['thousand'];
    }
}
