<?php

use PHPUnit\Framework\TestCase;
use App\User;

class UserTest extends TestCase
{
    public function testsReturnsFullName()
    {
        $user = new User('Wael', 'Ali');
        self::assertEquals('Wael Ali', $user->getFullName());
    }
}