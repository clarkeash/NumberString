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

    public function parse($number)
    {
        $rounded = $this->round($number);

        $count = $this->unitParser->parse($rounded / 100);

        $string = $count . ' ' . $this->data['hundred'];

        if($number % 100 == 0) return $string;

        $remainder = $number - $rounded;

        if($remainder < 20)
        {
            $additional = $this->unitParser->parse($remainder);
        }
        else
        {
            $additional = $this->tensParser->parse($remainder);
        }

        return $string . ' and ' . $additional;
    }

    public function round($number)
    {
        return $this->down($number, 100);
    }
}
