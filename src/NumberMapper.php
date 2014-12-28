<?php namespace Acme;

use InvalidArgumentException;
use Symfony\Component\Yaml\Yaml;

class NumberMapper
{
    /**
     * @var array
     */
    protected $data;
    /**
     * @var array
     */
    protected $parsers;

    /**
     * @param string $lang
     */
    public function __construct($lang = 'en')
    {
        $file = file_get_contents(__DIR__ . '/lang/' . $lang . '.yml');
        $this->data = Yaml::parse($file);

        $this->parsers = [
            'unit' => new UnitParser($this->data),
            'tens' => new TensParser($this->data),
            'hundreds' => new HundredsParser($this->data),
            'thousands' => new ThousandsParser($this->data),
            'millions' => new MillionsParser($this->data),
        ];
    }

    /**
     * @param integer $number
     * @return string
     */
    public function parse($number)
    {
        if(!is_integer($number)) throw new InvalidArgumentException;

        return $this->calculate($number);
    }

    /**
     * @param integer $number
     * @return string
     */
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

        if($number->getOriginal() < 1000000)
        {
            return $this->thousands($number);
        }

        if($number->getOriginal() < 1000000000)
        {
            return $this->millions($number);
        }
    }


    /**
     * @param Number $number
     * @return mixed
     */
    protected function units(Number $number)
    {
        return $this->parsers['unit']->parse($number);
    }


    /**
     * @param Number $number
     * @return string
     */
    protected function tens(Number $number)
    {
        $string = $this->parsers['tens']->parse($number);

        if($number->getUnits() > 0)
        {
            $string .= ' ' . $this->parsers['unit']->parse($number);
        }

        return $string;
    }


    /**
     * @param Number $number
     * @return string
     */
    protected function hundreds(Number $number)
    {
        $string = $this->parsers['hundreds']->parse($number);

        if($number->getTens() > 1)
        {
            $string .= ' and ' . $this->tens($number);
        }
        elseif($number->getTens() > 0)
        {
            $string .= ' and' . $this->tens($number);
        }

        return $string;
    }

    /**
     * @param Number $number
     * @return string
     */
    protected function thousands(Number $number)
    {
        $string = $this->parsers['thousands']->parse($number);

        if($number->getHundreds() > 0)
        {
            $string .= ' ' . $this->hundreds($number);
        }

        return $string;
    }

    /**
     * @param Number $number
     * @return string
     */
    protected function millions(Number $number)
    {
        $string = $this->parsers['millions']->parse($number);

        if($number->getThousands() > 0)
        {
            $string .= ' ' . $this->thousands($number);
        }
        elseif($number->getHundreds() > 0)
        {
            $string .= ' ' . $this->hundreds($number);
        }

        return $string;
    }
}
