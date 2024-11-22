<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_displays_the_category_create_page()
    {
        $response = $this->get(route('categories.create'));

        $response->assertStatus(200);
        $response->assertViewIs('categories.create');
    }

    /** @test */
    public function it_can_store_a_new_category()
    {
        $data = [
            'name' => 'Tech News',
        ];

        $response = $this->post(route('categories.store'), $data);

        $response->assertRedirect(route('news.index'));
        $response->assertSessionHas('success', 'Categoria criada com sucesso!');
        $this->assertDatabaseHas('categories', [
            'name' => 'Tech News',
            'slug' => 'tech-news',
        ]);
    }

    /** @test */
    public function it_fails_to_store_category_with_invalid_data()
    {
        $response = $this->post(route('categories.store'), [
            'name' => '',
        ]);

        $response->assertSessionHasErrors(['name']);
        $this->assertDatabaseCount('categories', 0);
    }

    /** @test */
    public function it_fails_to_store_category_with_duplicate_name()
    {
        Category::factory()->create(['name' => 'Tech News']);

        $response = $this->post(route('categories.store'), [
            'name' => 'Tech News',
        ]);

        $response->assertSessionHasErrors(['name']);
        $this->assertDatabaseCount('categories', 1);
    }
}
