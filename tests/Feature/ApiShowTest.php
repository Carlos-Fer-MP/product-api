<?php

namespace Tests\Feature;

use Tests\TestCase;

class ApiShowTest extends TestCase
{

    public function test_show_method_works_correctly(): void
    {
        $response = $this->get('/product/id');

        $response->assertStatus(200);
    }
}
