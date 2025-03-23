<?php

namespace Tests\Feature;

use App\Domain\Repositories\AccountRepositoryInterface;
use App\Domain\UseCases\LoginCase;
use App\Domain\ValueObjects\Password;
use App\Exceptions\Account\AccountNotFoundException;
use App\Exceptions\Account\InvalidPasswordException;
use App\Models\Account;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginCaseTest extends TestCase
{
    private AccountRepositoryInterface $accountRepository;

    protected function setUp(): void
    {
        $this->accountRepository = $this->createMock(AccountRepositoryInterface::class);
    }
    public function testShouldLogin(): void
    {
        $accountPassword = 'password123';
        $account = new Account();
        $account->password = (new Password($accountPassword))->__toString();
        $this->accountRepository->method('find')->willReturn($account);
        $loginCase = new LoginCase($this->accountRepository);
        $account = $loginCase->execute('mateusfinder@gmail.com', 'password123');
        $this->assertInstanceOf(Account::class, $account);
    }

    public function testShouldNotLoginWithoutAccount()
    {
        $this->accountRepository->method('find')->willReturn(null);
        $this->expectException(AccountNotFoundException::class);
        $loginCase = new LoginCase($this->accountRepository);
        $loginCase->execute('mateus@gmail.com', 'password123');
    }

    public function testShouldNotCreateAccountWithInvalidPassword()
    {
        $accountPassword = 'password123';
        $account = new Account();
        $account->password = (new Password($accountPassword))->__toString();
        $this->accountRepository->method('find')->willReturn($account);
        $this->expectException(InvalidPasswordException::class);
        $loginCase = new LoginCase($this->accountRepository);
        $loginCase->execute('mateus@gmail.com', 'divergentPassword123');
    }
}
