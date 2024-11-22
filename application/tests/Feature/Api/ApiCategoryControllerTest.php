<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiCategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_categories_with_pagination()
    {
        Category::factory()->count(15)->create();

        $response = $this->getJson('/api/categories');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'name', 'slug', 'news_count']
                ],
                'links',
                'meta',
            ]);
    }

    /** @test */
    public function it_can_list_all_categories_in_alphabetical_order()
    {
        Category::factory()->create(['name' => 'B']);
        Category::factory()->create(['name' => 'A']);

        $response = $this->getJson('/api/categories/list');

        $response->assertStatus(200)
            ->assertJsonFragment(['name' => 'A'])
            ->assertJsonFragment(['name' => 'B'])
            ->assertSeeInOrder(['A', 'B']);
    }

    /** @test */
    public function it_can_store_a_new_category()
    {
        $payload = ['name' => 'Test Category'];

        $response = $this->postJson('/api/categories', $payload);

        $response->assertStatus(201)
            ->assertJsonFragment([
                'name' => 'Test Category',
                'slug' => 'test-category',
            ]);

        $this->assertDatabaseHas('categories', ['name' => 'Test Category', 'slug' => 'test-category']);
    }

    /** @test */
    public function it_can_show_a_category_with_news_count()
    {
        $category = Category::factory()->hasNews(3)->create();

        $response = $this->getJson("/api/categories/{$category->id}");

        $response->assertStatus(200)
            ->assertJsonFragment([
                'id' => $category->id,
                'news_count' => 3,
            ]);
    }

    /** @test */
    public function it_can_update_a_category()
    {
        $category = Category::factory()->create(['name' => 'Old Name']);

        $payload = ['name' => 'Updated Name'];

        $response = $this->putJson("/api/categories/{$category->id}", $payload);

        $response->assertStatus(200)
            ->assertJsonFragment([
                'name' => 'Updated Name',
                'slug' => 'updated-name',
            ]);

        $this->assertDatabaseHas('categories', ['name' => 'Updated Name', 'slug' => 'updated-name']);
    }

    /** @test */
    public function it_can_delete_a_category()
    {
        $category = Category::factory()->create();

        $response = $this->deleteJson("/api/categories/{$category->id}");

        $response->assertStatus(200)
            ->assertJsonFragment(['message' => 'Categoria excluída com sucesso']);

        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }
}
