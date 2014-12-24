<?php

namespace spec\Acme;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NumberMapperSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\NumberMapper');
    }

    public function it_parses_1_into_one()
    {
        $this->parse(1)->shouldReturn("one");
    }

    public function it_parses_3_into_three()
    {
        $this->parse(3)->shouldReturn("three");
    }

    public function it_parses_17_into_seventeen()
    {
        $this->parse(17)->shouldReturn("seventeen");
    }

    public function it_throws_exception_if_a_non_integer_value_is_passed()
    {
        $this->shouldThrow('\InvalidArgumentException')->duringParse("squawk");
    }

    public function it_parses_0_into_zero()
    {
        $this->parse(0)->shouldReturn("zero");
    }

//    public function it_parses_25_into_twenty_five()
//    {
//        $this->parse(25)->shouldReturn("twenty five");
//    }
}
