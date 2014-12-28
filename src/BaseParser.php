<?php namespace Acme;

abstract class BaseParser
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
} 