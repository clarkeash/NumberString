<?php namespace Acme;

class ThousandsParser extends BaseParser implements ParsableInterface
{
    /**
     * @param Number $number
     * @return string
     */
    public function parse(Number $number)
    {
        $count = (new NumberMapper)->parse($number->getThousands());
        return $count . ' ' . $this->data['thousand'];
    }
}
