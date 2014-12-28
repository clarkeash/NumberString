<?php namespace Acme;

use InvalidArgumentException;

class Number
{
    protected $original = 0;

    protected $units = 0;
    protected $tens = 0;
    protected $hundreds = 0;
    protected $thousands = 0;
    protected $millions = 0;
    protected $data = [];

    private function __construct($value)
    {
        if(!is_integer($value)) throw new InvalidArgumentException;
        $this->data = str_split((string) $value);

        $this->original = $value;

        $this->units = count($this->data) > 0 ? (int) array_pop($this->data) : 0;
        $this->tens = count($this->data) > 0 ? (int) array_pop($this->data) : 0;
        $this->hundreds = count($this->data) > 0 ? (int) array_pop($this->data) : 0;
        $this->setThousands();
        $this->setMillions();
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

    public function setThousands()
    {
        $data = array_splice($this->data, -3, 3);
        $this->thousands = (int) implode('', $data);
    }

    /**
     * @return int
     */
    public function getMillions()
    {
        return $this->millions;
    }

    public function setMillions()
    {
        $data = array_splice($this->data, -3, 3);
        $this->millions = (int) implode('', $data);
    }
}
