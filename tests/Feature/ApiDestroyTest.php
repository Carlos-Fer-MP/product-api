<?php

namespace Tests\Feature;

use Tests\TestCase;

class ApiDestroyTest extends TestCase
{
    public function test_destroy_method_works_correctly(): void
    {
        $response = $this->delete('/product/id');

        $response->assertStatus(200);
    }
}
