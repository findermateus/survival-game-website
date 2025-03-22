<?php

namespace Tests\Unit\ValueObjects;

use App\Domain\ValueObjects\Password;
use Exception;
use PHPUnit\Framework\TestCase;
use Symfony\Component\CssSelector\Node\PseudoNode;

class PasswordTest extends TestCase
{
    private string $hashedPassword;

    protected function setUp(): void
    {
        $this->hashedPassword = (new Password("SenhaTeste123"))->__toString();
    }

    public function testPasswordShouldBeValid(): void
    {
        $validPassword = "SenhaTeste123";
        $password = new Password($validPassword);
        $this->assertTrue($password->verify($this->hashedPassword));
    }

    public function testPasswordShouldBeInvalid(): void
    {
        $invalidPassword = "invalid";
        $this->expectException(Exception::class);
        $password = new Password($invalidPassword);
    }
}
