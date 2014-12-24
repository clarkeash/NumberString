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

    public function it_parses_25_into_twenty_five()
    {
        $this->parse(25)->shouldReturn("twenty five");
    }
}
