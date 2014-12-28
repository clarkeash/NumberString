<?php

namespace Acme;

class MillionsParser implements ParsableInterface
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function parse(Number $number)
    {
        $count = (new NumberMapper)->parse($number->getMillions());
        return $count . ' ' . $this->data['million'];
    }
}
