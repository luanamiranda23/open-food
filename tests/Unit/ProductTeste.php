<?php

namespace Tests\Unit;

use App\Models\Product;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase;

    public function testGetProductReturnsProduct()
    {
        $product = Product::factory()->create();

        $response = $this->get('/products/' . $product->code);

        $response->assertStatus(200)
            ->assertJson([
                'code' => $product->code,
                'name' => $product->name,
                // Verifique outros campos do produto conforme necessário
            ]);
    }

    public function testGetProductReturnsNotFound()
    {
        $response = $this->get('/products/123');

        $response->assertStatus(404)
            ->assertJson([
                'message' => 'Product not found',
            ]);
    }
}
