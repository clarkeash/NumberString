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

    public function it_parses_700_into_seven_hundred()
    {
        $this->parse(700)->shouldReturn("seven hundred");
    }

    public function it_parses_204_into_two_hundred_and_four()
    {
        $this->parse(204)->shouldReturn("two hundred and four");
    }

    public function it_parses_415_into_four_hundred_and_fifteen()
    {
        $this->parse(415)->shouldReturn("four hundred and fifteen");
    }

    public function it_parses_123_into_one_hundred_and_twenty_three()
    {
        $this->parse(123)->shouldReturn("one hundred and twenty three");
    }
}
