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

    public function it_parses_2_into_two()
    {
        $this->parse(2)->shouldReturn("two");
    }

    public function it_parses_25_into_twenty_five()
    {
        $this->parse(25)->shouldReturn("twenty five");
    }

    public function it_parses_375_into_three_hundred_and_seventy_five()
    {
        $this->parse(375)->shouldReturn("three hundred and seventy five");
    }
}
