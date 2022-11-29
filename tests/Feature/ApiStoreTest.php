<?php

namespace Tests\Feature;

use Tests\TestCase;

class ApiStoreTest extends TestCase
{
    public function test_store_method_works_correctly(): void
    {
        $response = $this->post('/product');

        $response->assertStatus(200);
    }
}
