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

    public function parse(Number $number)
    {
        $rounded = $number->getTens() * 10;
        return $this->data[$rounded];
    }
}
