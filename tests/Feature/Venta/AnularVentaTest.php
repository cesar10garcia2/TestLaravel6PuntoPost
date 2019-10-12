<?php

namespace Tests\Feature\Venta;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AnularVentaTest extends TestCase
{

    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
