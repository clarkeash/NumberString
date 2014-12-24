<?php

namespace spec\Acme;

use Acme\RoundableTrait;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RoundableTraitSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beAnInstanceOf('spec\Acme\RoundableTraitStub');
    }

    public function it_rounds_down_by_10()
    {
        $this->down(21, 10)->shouldReturn(20);
        $this->down(29, 10)->shouldReturn(20);
        $this->down(20, 10)->shouldReturn(20);
    }

    public function it_rounds_up_by_10()
    {
        $this->up(21, 10)->shouldReturn(30);
        $this->up(29, 10)->shouldReturn(30);
        $this->up(20, 10)->shouldReturn(20);
    }

    public function it_rounds_by_any_value()
    {
        $this->up(17, 100)->shouldReturn(100);
        $this->down(17, 100)->shouldReturn(0);

        $this->up(17, 1000)->shouldReturn(1000);
        $this->down(17, 1000)->shouldReturn(0);

        $this->up(17, 10000)->shouldReturn(10000);
        $this->down(17, 10000)->shouldReturn(0);
    }

    public function it_rounds_zero()
    {
        $this->up(0, 10)->shouldReturn(0);
        $this->down(0, 10)->shouldReturn(0);
    }

    public function protect_against_division_by_zero()
    {
        $this->shouldThrow('\InvalidArgumentException')->duringUp(3, 0);
        $this->shouldThrow('\InvalidArgumentException')->duringDown(3, 0);
    }
}

class RoundableTraitStub { use RoundableTrait; }