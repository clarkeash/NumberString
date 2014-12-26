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
            'unit' => new UnitParser($this->data),
            'tens' => new TensParser($this->data),
            'hundreds' => new HundredsParser($this->data)
        ];
    }

    public function parse($number)
    {
        if(!is_integer($number)) throw new InvalidArgumentException;

        return $this->calculate($number);
    }

    protected function calculate($number)
    {
        $number = Number::make($number);

        if($number->getOriginal() < 20)
        {
            return $this->units($number);
        }

        if($number->getOriginal() < 100)
        {
            return $this->tens($number);
        }

        if($number->getOriginal() < 1000)
        {
            return $this->hundreds($number);
        }
    }

    /**
     * @param $number
     * @return mixed
     */
    protected function units($number)
    {
        return $this->parsers['unit']->parse($number);
    }

    /**
     * @param $number
     * @return string
     */
    protected function tens($number)
    {
        return $this->parsers['tens']->parse($number) . ' ' . $this->parsers['unit']->parse($number);
    }

    /**
     * @param $number
     * @return string
     */
    protected function hundreds($number)
    {
        $string = $this->parsers['hundreds']->parse($number);
        $string .= ' and ';
        $string .= $this->parsers['tens']->parse($number);
        $string .= ' ';
        $string .= $this->parsers['unit']->parse($number);

        return $string;
    }
}
