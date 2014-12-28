<?php namespace Acme;

use InvalidArgumentException;

class Number
{
    /**
     * @var int
     */
    protected $original = 0;

    /**
     * @var int
     */
    protected $units = 0;
    /**
     * @var int
     */
    protected $tens = 0;
    /**
     * @var int
     */
    protected $hundreds = 0;
    /**
     * @var int
     */
    protected $thousands = 0;
    /**
     * @var int
     */
    protected $millions = 0;
    /**
     * @var array
     */
    protected $data = [];

    /**
     * @param $value
     */
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

    /**
     * @param integer $value
     * @return static
     */
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

    /**
     * Set thousand value.
     */
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

    /**
     * set million value.
     */
    public function setMillions()
    {
        $data = array_splice($this->data, -3, 3);
        $this->millions = (int) implode('', $data);
    }
}
