<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tymon\JWTAuth\Contracts\JWTSubject;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    public function jsonAs(JWTSubject $user, $method, $endpoint, $data = [], $headers = [])
    {
        $token = auth()->tokenById($user->id);

        return $this->json($method, $endpoint, $data, array_merge($headers, [
            'Authorization' => 'Bearer ' . $token
        ]));
    }
}
