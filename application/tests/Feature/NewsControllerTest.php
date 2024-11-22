<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\News;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NewsControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_displays_the_news_index_page()
    {
        $category = Category::factory()->create();
        News::factory()->count(5)->create(['category_id' => $category->id]);

        $response = $this->get(route('news.index'));

        $response->assertStatus(200);
        $response->assertViewIs('news.index');
        $response->assertViewHas('news');
        $response->assertViewHas('categories');
    }

    /** @test */
    public function it_displays_the_news_create_page()
    {
        Category::factory()->count(3)->create();

        $response = $this->get(route('news.create'));

        $response->assertStatus(200);
        $response->assertViewIs('news.create');
        $response->assertViewHas('categories');
    }

    /** @test */
    public function it_can_store_a_new_news_item()
    {
        $category = Category::factory()->create();

        $response = $this->post(route('news.store'), [
            'title' => 'Sample News Title',
            'content' => 'This is the content of the news.',
            'category_id' => $category->id,
        ]);

        $response->assertRedirect(route('news.index'));
        $response->assertSessionHas('success', 'Notícia criada com sucesso!');
        $this->assertDatabaseHas('news', [
            'title' => 'Sample News Title',
            'slug' => 'sample-news-title',
            'category_id' => $category->id,
        ]);
    }

    /** @test */
    public function it_fails_to_store_news_without_required_fields()
    {
        $response = $this->post(route('news.store'), []);

        $response->assertSessionHasErrors(['title', 'content', 'category_id']);
        $this->assertDatabaseCount('news', 0);
    }

    /** @test */
    public function it_can_filter_news_by_search_term()
    {
        $category = Category::factory()->create();
        News::factory()->create([
            'title' => 'Breaking News',
            'content' => 'Important content',
            'category_id' => $category->id,
        ]);

        News::factory()->create([
            'title' => 'Tech Updates',
            'content' => 'New tech content',
            'category_id' => $category->id,
        ]);

        $response = $this->get(route('news.index', ['search' => 'Breaking']));

        $response->assertStatus(200);
        $response->assertViewHas('news', function ($news) {
            return $news->total() === 1 && $news->first()->title === 'Breaking News';
        });
    }
}
