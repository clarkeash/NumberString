<?php

namespace spec\Acme;

use Acme\Number;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Yaml\Yaml;

class MillionsParserSpec extends ObjectBehavior
{
    public function let()
    {
        $file = file_get_contents(__DIR__ . '/../src/lang/' . 'en' . '.yml');
        $data = Yaml::parse($file);
        $this->beConstructedWith($data);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\MillionsParser');
        $this->shouldHaveType('Acme\ParsableInterface');
    }

//    public function it_parses_45000000_into_forty_five_million()
//    {
//        $number = Number::make(45000000);
//        $this->parse($number)->shouldReturn("forty five million");
//    }
//
//    public function it_parses_263000000_into_two_hundred_and_sixty_three_million()
//    {
//        $number = Number::make(263000000);
//        $this->parse($number)->shouldReturn("two hundred and sixty three million");
//    }
//
//    public function it_parses_1333333_into_one_million()
//    {
//        $number = Number::make(1333333);
//        $this->parse($number)->shouldReturn("one million");
//    }
}
