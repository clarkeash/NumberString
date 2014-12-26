<?php

namespace spec\Acme;

use Acme\Number;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TensParserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\TensParser');
    }

//    public function it_throws_exception_if_a_non_integer_value_is_passed()
//    {
//        $this->shouldThrow('\InvalidArgumentException')->duringParse("squawk");
//    }

    public function it_parses_20s_into_twenty()
    {
        $number = Number::make(20);
        $this->parse($number)->shouldReturn("twenty");
        $number = Number::make(29);
        $this->parse($number)->shouldReturn("twenty");
    }

    public function it_parses_30s_into_thirty()
    {
        $number = Number::make(30);
        $this->parse($number)->shouldReturn("thirty");
        $number = Number::make(39);
        $this->parse($number)->shouldReturn("thirty");
    }

    public function it_parses_40s_into_forty()
    {
        $number = Number::make(40);
        $this->parse($number)->shouldReturn("forty");
        $number = Number::make(49);
        $this->parse($number)->shouldReturn("forty");
    }

    public function it_parses_20s_into_fifty()
    {
        $number = Number::make(50);
        $this->parse($number)->shouldReturn("fifty");
        $number = Number::make(59);
        $this->parse($number)->shouldReturn("fifty");
    }

    public function it_parses_60s_into_sixty()
    {
        $number = Number::make(60);
        $this->parse($number)->shouldReturn("sixty");
        $number = Number::make(69);
        $this->parse($number)->shouldReturn("sixty");
    }

    public function it_parses_70s_into_seventy()
    {
        $number = Number::make(70);
        $this->parse($number)->shouldReturn("seventy");
        $number = Number::make(79);
        $this->parse($number)->shouldReturn("seventy");
    }

    public function it_parses_80s_into_eighty()
    {
        $number = Number::make(80);
        $this->parse($number)->shouldReturn("eighty");
        $number = Number::make(89);
        $this->parse($number)->shouldReturn("eighty");
    }

    public function it_parses_90s_into_ninety()
    {
        $number = Number::make(90);
        $this->parse($number)->shouldReturn("ninety");
        $number = Number::make(99);
        $this->parse($number)->shouldReturn("ninety");
    }
}
