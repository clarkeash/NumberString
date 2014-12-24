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

    public function parse($number)
    {
        if(!is_integer($number)) throw new InvalidArgumentException;
        if(array_key_exists($number, $this->data))
        {
            return $this->data[$number];
        }
    }
}
