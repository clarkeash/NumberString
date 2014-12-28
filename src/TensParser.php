<?php namespace Acme;

class TensParser extends BaseParser implements ParsableInterface
{
    /**
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data['tens'];
    }


    /**
     * @param Number $number
     * @return null
     */
    public function parse(Number $number)
    {
        if($number->getTens() > 1)
        {
            $rounded = $number->getTens() * 10;
            return $this->data[$rounded];
        }
        return null;
    }
}
