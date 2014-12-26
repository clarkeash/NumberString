<?php

namespace spec\Acme;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NumberSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Number');
    }

    public function it_throws_exception_if_a_non_integer_value_is_passed()
    {
        $this->beConstructedThrough('make', [1]); // only needed to prevent a reflection exception.
        $this->shouldThrow('\InvalidArgumentException')->during('make', ["squawk"]);
    }

    public function it_sets_original_value()
    {
        $this->beConstructedThrough('make', [1234]);
        $this->getOriginal()->shouldReturn(1234);
    }

    public function it_sets_units()
    {
        $this->beConstructedThrough('make', [3]);
        $this->getUnits()->shouldReturn(3);
    }

    public function it_sets_tens()
    {
        $this->beConstructedThrough('make', [34]);

        $this->getTens()->shouldReturn(3);
        $this->getUnits()->shouldReturn(4);
    }

    public function it_sets_hundreds()
    {
        $this->beConstructedThrough('make', [287]);

        $this->getHundreds()->shouldReturn(2);
        $this->getTens()->shouldReturn(8);
        $this->getUnits()->shouldReturn(7);
    }

    public function it_sets_thousands()
    {
        $this->beConstructedThrough('make', [3456]);

        $this->getThousands()->shouldReturn(3);
        $this->getHundreds()->shouldReturn(4);
        $this->getTens()->shouldReturn(5);
        $this->getUnits()->shouldReturn(6);
    }

    public function it_sets_thousands_up_to_hundred_thousands()
    {
        $this->beConstructedThrough('make', [125765]);

        $this->getThousands()->shouldReturn(125);
        $this->getHundreds()->shouldReturn(7);
        $this->getTens()->shouldReturn(6);
        $this->getUnits()->shouldReturn(5);
    }
}
