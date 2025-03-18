<?php

namespace Tests\Unit\ValueObjects;

use App\Domain\ValueObjects\FederalId;
use Exception;
use PHPUnit\Framework\TestCase;

class FederalIdTest extends TestCase
{
    public function testFederalIdShouldBeValid(): void
    {
        $validFederalId = "081.982.869-69";
        $federalId = new FederalId($validFederalId);
        $this->assertEquals("08198286969", $federalId->__toString());
    }

    public function testFederalIdShouldBeInvalid(): void
    {
        $invalidFederalId = "081.982.869-68";
        $this->expectException(Exception::class);
        $federalId = new FederalId($invalidFederalId);
    }
}
