<?php namespace Acme;

class HundredsParser extends BaseParser implements ParsableInterface
{
    /**
     * @param Number $number
     * @return string
     */
    public function parse(Number $number)
    {
        $count = (new NumberMapper)->parse($number->getHundreds());
        return $count . ' ' . $this->data['hundred'];
    }
}
