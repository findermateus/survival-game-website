<?php

namespace Tests\Feature;

use App\Domain\Repositories\AccountRepositoryInterface;
use App\Domain\UseCases\LoginCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\MockObject\MockObject;
use Tests\TestCase;

class LogInTest extends TestCase
{
    private MockObject $accountRepository;

//    protected function setUp(): void
//    {
//        $this->accountRepository = $this->createMock(AccountRepositoryInterface::class);
//    }
//    public function testShouldLogIn(): void
//    {
//        $this->accountRepository->method('logIn');
//        $logInCase = new LoginCase($this->accountRepository);
//        $logInCase->execute();
//    }

}
