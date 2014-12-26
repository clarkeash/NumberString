<?php namespace Acme;

use InvalidArgumentException;
use Symfony\Component\Yaml\Yaml;

class UnitParser
{
    protected $data;

    public function __construct($lang = 'en')
    {
        $file = file_get_contents(__DIR__ . '/lang/' . $lang . '.yml');
        $this->data = Yaml::parse($file)['basics'];
    }

    public function parse(Number $number)
    {
        $value = $number->getUnits();

        if($number->getTens() == 1)
        {
            $value = $number->getTens() . $value;
        }

        if(array_key_exists($value, $this->data))
        {
            return $this->data[$value];
        }
    }
}
