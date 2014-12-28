<?php namespace Acme;

interface ParsableInterface
{
    /**
     * @param Number $number
     * @return mixed
     */
    public function parse(Number $number);
}