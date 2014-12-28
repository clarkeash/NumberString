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

    public function it_parses_14_into_fourteen()
    {
        $this->parse(14)->shouldReturn("fourteen");
    }

    public function it_parses_20_into_twenty()
    {
        $this->parse(20)->shouldReturn("twenty");
    }

    public function it_parses_25_into_twenty_five()
    {
        $this->parse(25)->shouldReturn("twenty five");
    }

    public function it_parses_300_into_three_hundred()
    {
        $this->parse(300)->shouldReturn("three hundred");
    }

    public function it_parses_370_into_three_hundred_and_seventy()
    {
        $this->parse(370)->shouldReturn("three hundred and seventy");
    }

    public function it_parses_211_into_two_hundred_and_eleven()
    {
        $this->parse(211)->shouldReturn("two hundred and eleven");
    }

    public function it_parses_375_into_three_hundred_and_seventy_five()
    {
        $this->parse(375)->shouldReturn("three hundred and seventy five");
    }

    public function it_parses_200000_into_two_hundred_thousand()
    {
        $this->parse(200000)->shouldReturn("two hundred thousand");
    }

    public function it_parses_375211_into_three_hundred_and_seventy_five_thousand_two_hundred_and_eleven()
    {
        $this->parse(375211)->shouldReturn("three hundred and seventy five thousand two hundred and eleven");
    }

    public function it_parses_375254_into_three_hundred_and_seventy_five_thousand_two_hundred_and_fifty_four()
    {
        $this->parse(375254)->shouldReturn("three hundred and seventy five thousand two hundred and fifty four");
    }

    public function it_parses_200000000_into_two_hundred_million()
    {
        $this->parse(200000000)->shouldReturn("two hundred million");
    }

    public function it_parses_375000211_into_three_hundred_and_seventy_five_million_two_hundred_and_eleven()
    {
        $this->parse(375000211)->shouldReturn("three hundred and seventy five million two hundred and eleven");
    }

    public function it_parses_375254678_into_three_hundred_and_seventy_five_million_two_hundred_and_fifty_four_thousand_six_hundred_and_seventy_eight()
    {
        $this->parse(375254678)->shouldReturn("three hundred and seventy five million two hundred and fifty four thousand six hundred and seventy eight");
    }
}
