<?php

namespace Unit;

use PHPUnit\Framework\TestCase;
use Skipprd\MachineToHuman\BytesToHuman;

class BytesToHumanTest extends TestCase
{

    public function testBasic() {

        $human = BytesToHuman::toHuman(1024, true, 0);

        $this->assertEquals('1KB', $human);
    }

    public function testOneByteBasic() {

        $human = BytesToHuman::toHuman(1, true, 0);

        $this->assertEquals('1B', $human);
    }

    public function testOneMegaByteBasic() {

        $human = BytesToHuman::toHuman(1024000, true, 0);

        $this->assertEquals('1MB', $human);
    }
}
