<?php

namespace Acme;

class MillionsParser extends BaseParser implements ParsableInterface
{
    public function parse(Number $number)
    {
        $count = (new NumberMapper)->parse($number->getMillions());
        return $count . ' ' . $this->data['million'];
    }
}
