<?php namespace Acme;

use InvalidArgumentException;
use Symfony\Component\Yaml\Yaml;

class TensParser
{
    use RoundableTrait;

    protected $data;
    protected $unitParser;

    public function __construct($lang = 'en')
    {
        $file = file_get_contents(__DIR__ . '/lang/' . $lang . '.yml');
        $this->data = Yaml::parse($file)['tens'];

        $this->unitParser = new UnitParser;
    }

    public function parse($number)
    {
        if(!is_integer($number)) throw new InvalidArgumentException;
        $rounded = $this->round($number);

        $string = $this->data[$rounded];

        if($number % 10 == 0) return $string;

        return $string . ' ' . $this->unitParser->parse($number - $rounded);
    }

    public function round($number)
    {
        return $this->down($number, 10);
    }

}
