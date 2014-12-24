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
    }

    protected function basicValueLookup($key)
    {
        if(array_key_exists($key, $this->data['basics']))
        {
            return $this->data['basics'][$key];
        }
    }

    public function parse($number)
    {
        if(!is_integer($number)) throw new InvalidArgumentException;
        return $this->basicValueLookup($number);
    }
}
