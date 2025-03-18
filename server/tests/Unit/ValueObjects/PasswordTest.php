<?php

namespace Tests\Unit\ValueObjects;

use App\Domain\ValueObjects\Password;
use Exception;
use PHPUnit\Framework\TestCase;

class PasswordTest extends TestCase
{
    public function testPasswordShouldBeValid(): void
    {
        $validPassword = "SenhaTeste123";
        $password = new Password($validPassword);
        $this->assertTrue($password->verify($validPassword));
    }

    public function testPasswordShouldBeInvalid(): void
    {
        $invalidPassword = "invalid";
        $this->expectException(Exception::class);
        $password = new Password($invalidPassword);
    }
}
