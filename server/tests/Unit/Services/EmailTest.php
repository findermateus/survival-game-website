<?php

namespace Tests\Unit;

use App\Domain\Services\EmailValidatorService;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    private EmailValidatorService $emailValidator;

    public function setUp(): void
    {
        $this->emailValidator = new EmailValidatorService();
    }

    public function testEmailShouldBeValid(): void
    {
        $validEmail = "qB2lW@example.com";
        $this->assertTrue($this->emailValidator->validate($validEmail));
    }

    public function testEmailShouldBeInvalid(): void
    {
        $invalidEmails = [
            "invalid_email",
            "invalid_email@",
            "invalid_email@.",
            "invalid_email@.com",
            "@.com",
            "@test.com"
        ];
        foreach ($invalidEmails as $invalidEmail) {
            $this->assertFalse($this->emailValidator->validate($invalidEmail));
        }
    }
}
