<?php

namespace Tests\Feature;

use App\Domain\Repositories\AccountRepositoryInterface;
use App\Domain\UseCases\CreateAccountCase;
use App\Domain\ValueObjects\FederalId;
use App\Exceptions\Account\AccountAlreadyExistsException;
use App\Exceptions\Account\InvalidEmailException;
use App\Exceptions\Account\InvalidPasswordException;
use App\Models\Account;
use PHPUnit\Framework\MockObject\MockObject;
use Tests\TestCase;

class CreateAccountCaseTest extends TestCase
{
    private MockObject $accountRepositoryMock;

    protected function setUp(): void
    {
        $this->accountRepositoryMock = $this->createMock(AccountRepositoryInterface::class);
    }

    public function testShouldCreateAccount(): void
    {
        $request = [
            'name' => 'John Doe',
            'email' => 'mateusfinder@gmail.com',
            'password' => 'validPassword123',
            'federalId' => '287.962.090-20'
        ];
        $cleanFederalId = new FederalId($request['federalId']);
        $this->accountRepositoryMock
            ->method('findAccount')
            ->with($request['email'], $cleanFederalId->__toString())
            ->willReturn(null);
        $createAccountCase = new CreateAccountCase($this->accountRepositoryMock);
        $createAccountCase->execute($request['name'], $request['password'], $request['email'], $request['federalId'] );
    }

    public function testShouldNotCreateAccountIfAccountAlreadyExists(){
        $request = [
            'name' => 'John Doe',
            'email' => 'mateusfinder@gmail.com',
            'password' => 'validPassword123',
            'federalId' => '287.962.090-20'
        ];
        $this->accountRepositoryMock
            ->method('findAccount')
            ->willReturn(new Account());
        $createAccountCase = new CreateAccountCase($this->accountRepositoryMock);
        $this->expectException(AccountAlreadyExistsException::class);
        $createAccountCase->execute($request['name'], $request['password'], $request['email'], $request['federalId']);
    }

    public function testShouldThrowInvalidEmailException(){
        $request = [
            'name' => 'John Doe',
            'email' => '',
            'password' => 'validPassword123',
            'federalId' => '287.962.090-20'
        ];
        $createAccountCase = new CreateAccountCase($this->accountRepositoryMock);
        $this->expectException(InvalidEmailException::class);
        $createAccountCase->execute($request['name'], $request['password'], $request['email'], $request['federalId'] );
    }

    public function testPasswordLengthShouldBeHigherOrEqualToEight(){
        $request = [
            'name' => 'John Doe',
            'email' => 'mateusfinder@gmail.com',
            'password' => 'invalid',
            'federalId' => '287.962.090-20'
        ];
        $createAccountCase = new CreateAccountCase($this->accountRepositoryMock);
        $this->expectException(InvalidPasswordException::class);
        $createAccountCase->execute($request['name'], $request['password'], $request['email'], $request['federalId'] );
    }
}
