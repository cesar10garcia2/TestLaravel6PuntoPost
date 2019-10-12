<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public $user;

    public function createUser()
    {
        if (!$this->user) {
            $this->user = factory(User::class)->create();
        }
        return $this->user;
    }
}
