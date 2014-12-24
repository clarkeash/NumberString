<?php

namespace spec\Acme;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TensParserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\TensParser');
    }

    public function it_throws_exception_if_a_non_integer_value_is_passed()
    {
        $this->shouldThrow('\InvalidArgumentException')->duringParse("squawk");
    }

    public function it_parses_20s_into_twenty()
    {
        $this->parse(20)->shouldReturn("twenty");
        $this->parse(29)->shouldReturn("twenty nine");
    }

    public function it_parses_30s_into_thirty()
    {
        $this->parse(30)->shouldReturn("thirty");
        $this->parse(39)->shouldReturn("thirty nine");
    }

    public function it_parses_40s_into_forty()
    {
        $this->parse(40)->shouldReturn("forty");
        $this->parse(49)->shouldReturn("forty nine");
    }

    public function it_parses_20s_into_fifty()
    {
        $this->parse(50)->shouldReturn("fifty");
        $this->parse(59)->shouldReturn("fifty nine");
    }

    public function it_parses_60s_into_sixty()
    {
        $this->parse(60)->shouldReturn("sixty");
        $this->parse(69)->shouldReturn("sixty nine");
    }

    public function it_parses_70s_into_seventy()
    {
        $this->parse(70)->shouldReturn("seventy");
        $this->parse(79)->shouldReturn("seventy nine");
    }

    public function it_parses_80s_into_eighty()
    {
        $this->parse(80)->shouldReturn("eighty");
        $this->parse(89)->shouldReturn("eighty nine");
    }

    public function it_parses_90s_into_ninety()
    {
        $this->parse(90)->shouldReturn("ninety");
        $this->parse(99)->shouldReturn("ninety nine");
    }
}
