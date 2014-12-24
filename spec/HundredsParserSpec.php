<?php

namespace spec\Acme;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HundredsParserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\HundredsParser');
    }

    public function it_parses_100_into_one_hundred()
    {
        $this->parse(100)->shouldReturn("one hundred");
    }
}
