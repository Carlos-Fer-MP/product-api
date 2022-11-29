<?php

namespace Tests\Feature;

use Tests\TestCase;

class ApiIndexTest extends TestCase
{

    public function test_index_method_works_correctly(): void
    {
        $response = $this->get('/product');

        $response->assertStatus(200);
    }
}
