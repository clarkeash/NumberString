<?php

namespace spec\Acme;

use Acme\Number;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Yaml\Yaml;

class HundredsParserSpec extends ObjectBehavior
{
    public function let()
    {
        $file = file_get_contents(__DIR__ . '/../src/lang/' . 'en' . '.yml');
        $data = Yaml::parse($file);
        $this->beConstructedWith($data);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\HundredsParser');
        $this->shouldHaveType('Acme\ParsableInterface');
    }

    public function it_parses_100_into_one_hundred()
    {
        $number = Number::make(100);
        $this->parse($number)->shouldReturn("one hundred");
    }

    public function it_parses_700_into_seven_hundred()
    {
        $number = Number::make(700);
        $this->parse($number)->shouldReturn("seven hundred");
    }

    public function it_parses_204_into_two_hundred()
    {
        $number = Number::make(204);
        $this->parse($number)->shouldReturn("two hundred");
    }

    public function it_parses_415_into_four_hundred()
    {
        $number = Number::make(415);
        $this->parse($number)->shouldReturn("four hundred");
    }

    public function it_parses_123_into_one_hundred()
    {
        $number = Number::make(123);
        $this->parse($number)->shouldReturn("one hundred");
    }
}
