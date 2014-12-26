<?php

namespace spec\Acme;

use Acme\Number;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Yaml\Yaml;

class ThousandsParserSpec extends ObjectBehavior
{
    public function let()
    {
        $file = file_get_contents(__DIR__ . '/../src/lang/' . 'en' . '.yml');
        $data = Yaml::parse($file);
        $this->beConstructedWith($data);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\ThousandsParser');
        $this->shouldHaveType('Acme\ParsableInterface');
    }

    public function it_parses_1000_into_one_thousand()
    {
        $number = Number::make(1000);
        $this->parse($number)->shouldReturn("one thousand");
    }

    public function it_parses_7000_into_one_thousand()
    {
        $number = Number::make(7000);
        $this->parse($number)->shouldReturn("seven thousand");
    }

    public function it_parses_17000_into_one_thousand()
    {
        $number = Number::make(17000);
        $this->parse($number)->shouldReturn("seventeen thousand");
    }

    public function it_parses_45000_into_one_thousand()
    {
        $number = Number::make(45000);
        $this->parse($number)->shouldReturn("forty five thousand");
    }

    public function it_parses_263000_into_one_thousand()
    {
        $number = Number::make(263000);
        $this->parse($number)->shouldReturn("two hundred and sixty three thousand");
    }

    public function it_parses_1333_into_one_thousand()
    {
        $number = Number::make(1333);
        $this->parse($number)->shouldReturn("one thousand");
    }
}
