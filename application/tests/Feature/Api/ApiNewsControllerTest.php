<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\News;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiNewsControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_news_with_pagination()
    {
        News::factory()->count(15)->for(Category::factory())->create();

        $response = $this->getJson('/api/news');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'title', 'slug', 'category' => ['id', 'name']],
                ],
                'links',
                'meta',
            ]);
    }

    /** @test */
    public function it_can_search_news_by_title_or_category()
    {
        $category = Category::factory()->create(['name' => 'Tech']);
        News::factory()->create(['title' => 'Laravel News', 'category_id' => $category->id]);
        News::factory()->create(['title' => 'Other News']);

        // Search by title
        $response = $this->getJson('/api/news/search?search=Laravel');

        $response->assertStatus(200)
            ->assertJsonFragment(['title' => 'Laravel News']);

        // Search by category
        $response = $this->getJson('/api/news/search?search=Tech');

        $response->assertStatus(200)
            ->assertJsonFragment(['title' => 'Laravel News']);
    }

    /** @test */
    public function it_can_store_a_new_news()
    {
        $category = Category::factory()->create();
        $payload = [
            'title' => 'New Feature in Laravel',
            'content' => 'Details about the new feature.',
            'category_id' => $category->id,
        ];

        $response = $this->postJson('/api/news', $payload);

        $response->assertStatus(201)
            ->assertJsonFragment([
                'title' => 'New Feature in Laravel',
                'slug' => 'new-feature-in-laravel',
            ]);

        $this->assertDatabaseHas('news', ['title' => 'New Feature in Laravel', 'slug' => 'new-feature-in-laravel']);
    }

    /** @test */
    public function it_can_show_a_news_with_category()
    {
        $news = News::factory()->for(Category::factory())->create();

        $response = $this->getJson("/api/news/{$news->id}");

        $response->assertStatus(200)
            ->assertJsonFragment([
                'id' => $news->id,
                'title' => $news->title,
                'slug' => $news->slug,
            ])
            ->assertJsonPath('data.category.id', $news->category->id)
            ->assertJsonPath('data.category.name', $news->category->name);

    }

    /** @test */
    public function it_can_update_a_news()
    {
        $category = Category::factory()->create();
        $news = News::factory()->create([
            'category_id' => $category->id,
        ]);

        $payload = [
            'title' => 'Updated Title',
            'content' => 'Updated content.',
            'category_id' => $category->id,
        ];

        $response = $this->putJson("/api/news/{$news->id}", $payload);

        $response->assertStatus(200)
            ->assertJsonFragment([
                'title' => 'Updated Title',
                'slug' => 'updated-title',
            ]);
    }

    /** @test */
    public function it_can_delete_a_news()
    {
        $news = News::factory()->create();

        $response = $this->deleteJson("/api/news/{$news->id}");

        $response->assertStatus(200)
            ->assertJsonFragment(['message' => 'Notícia excluída com sucesso']);

        $this->assertDatabaseMissing('news', ['id' => $news->id]);
    }
}
