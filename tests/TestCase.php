<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp() : void
    {
        parent::setUp();

        $this->artisan('migrate');
    }

    public function createUser(array $attributes = []) : User
    {
        return User::factory()->create($attributes);
    }
}
