<?php namespace Acme;

class UnitParser extends BaseParser implements ParsableInterface
{
    /**
     * @param array $data
     */
    public function __construct($data)
    {
        $this->data = $data['basics'];
    }

    /**
     * @param Number $number
     * @return mixed
     */
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
