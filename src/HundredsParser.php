<?php

namespace Acme;

use Symfony\Component\Yaml\Yaml;

class HundredsParser
{
    use RoundableTrait;

    public function __construct($lang = 'en')
    {
        $file = file_get_contents(__DIR__ . '/lang/' . $lang . '.yml');
        $this->data = Yaml::parse($file);

        $this->unitParser = new UnitParser;
        $this->tensParser = new TensParser;
    }

    public function parse(Number $number)
    {
        $number = Number::make($number->getHundreds());
        $count = $this->unitParser->parse( $number );
        return $count . ' ' . $this->data['hundred'];
    }
}
