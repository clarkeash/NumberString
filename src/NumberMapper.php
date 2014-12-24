<?php namespace Acme;

use InvalidArgumentException;
use Symfony\Component\Yaml\Yaml;

class NumberMapper
{
    protected $data;

    public function __construct($lang = 'en')
    {
        $file = file_get_contents(__DIR__ . '/lang/' . $lang . '.yml');
        $this->data = Yaml::parse($file);

        $this->parsers = [
            'unit' => new UnitParser,
            'tens' => new TensParser,
        ];
    }

    public function parse($number)
    {
        if(!is_integer($number)) throw new InvalidArgumentException;

        return $this->calculate($number);
    }

    protected function calculate($number)
    {
        if($number < 20)
        {
            return $this->parsers['unit']->parse($number);
        }

        if($number < 100)
        {
            return $this->parsers['tens']->parse($number);

//            $rounded = $this->parsers['tens']->round($number);
//            $tens = $this->parsers['tens']->parse($number);
//            $units = $this->parsers['unit']->parse($number - $rounded);
//
//            return $tens . ' ' . $units;
        }

        if($number < 1000)
        {

        }
    }
}
