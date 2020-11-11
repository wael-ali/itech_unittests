<?php

use \PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function testTwoPlusTwoResultsFour()
    {
        self::assertEquals(4, 2 + 2);
        self::assertTrue(true);
    }
}