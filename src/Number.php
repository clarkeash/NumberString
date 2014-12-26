<?php namespace Acme;

use InvalidArgumentException;

class Number
{
    protected $original = 0;

    protected $units = 0;
    protected $tens = 0;
    protected $hundreds = 0;
    protected $thousands = 0;

    private function __construct($value)
    {
        if(!is_integer($value)) throw new InvalidArgumentException;
        $array = str_split((string) $value);

        $this->original = $value;

        $this->units = count($array) > 0 ? (int) array_pop($array) : 0;
        $this->tens = count($array) > 0 ? (int) array_pop($array) : 0;
        $this->hundreds = count($array) > 0 ? (int) array_pop($array) : 0;
        $this->setThousands($array);
    }

    public static function make($value)
    {
        return new static($value);
    }

    /**
     * @return int
     */
    public function getOriginal()
    {
        return $this->original;
    }

    /**
     * @return int
     */
    public function getUnits()
    {
        return $this->units;
    }

    /**
     * @return int
     */
    public function getTens()
    {
        return $this->tens;
    }

    /**
     * @return int
     */
    public function getHundreds()
    {
        return $this->hundreds;
    }

    /**
     * @return int
     */
    public function getThousands()
    {
        return $this->thousands;
    }

    public function setThousands(array $thousands)
    {
        $this->thousands = (int) implode('', array_splice($thousands, null, 3));
    }


}
