<?php

namespace Tests\Feature;

use Tests\TestCase;

class ApiUpdateTest extends TestCase
{
    public function test_update_method_works_correctly(): void
    {
        $response = $this->put('/product/id');

        $response->assertStatus(200);
    }
}
