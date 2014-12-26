<?php

namespace spec\Acme;

use Acme\Number;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Yaml\Yaml;

class UnitParserSpec extends ObjectBehavior
{
    public function let()
    {
        $file = file_get_contents(__DIR__ . '/../src/lang/' . 'en' . '.yml');
        $data = Yaml::parse($file);
        $this->beConstructedWith($data);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\UnitParser');
        $this->shouldHaveType('Acme\ParsableInterface');
    }

    public function it_parses_0_into_zero()
    {
        $number = Number::make(0);
        $this->parse($number)->shouldReturn("zero");
    }

    public function it_parses_1_into_one()
    {
        $number = Number::make(1);
        $this->parse($number)->shouldReturn("one");
    }

    public function it_parses_3_into_three()
    {
        $number = Number::make(3);
        $this->parse($number)->shouldReturn("three");
    }

    public function it_parses_17_into_seventeen()
    {
        $number = Number::make(17);
        $this->parse($number)->shouldReturn("seventeen");
    }

//    public function it_throws_exception_if_a_non_integer_value_is_passed()
//    {
//        $this->shouldThrow('\InvalidArgumentException')->duringParse("squawk");
//    }
}
