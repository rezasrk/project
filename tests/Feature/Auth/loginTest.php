<?php

namespace Tests\Feature\Auth;

use Symfony\Component\HttpFoundation\JsonResponse;
use Tests\TestCase;

class loginTest extends TestCase
{
    /** @test */
    public function login()
    {
        $response = $this->post(route('login'));

        $response->status(JsonResponse::H);
    }
}
