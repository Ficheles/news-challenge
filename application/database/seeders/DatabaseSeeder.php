<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\News;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $categories = ['Tecnologia', 'Esportes', 'Política', 'Entretenimento'];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'slug' => \Str::slug($category)
            ]);
        }

        foreach (Category::all() as $category) {
            News::create([
                'title' => 'Notícia exemplo de ' . $category->name,
                'content' => 'Conteúdo de exemplo para a categoria ' . $category->name,
                'slug' => \Str::slug('Notícia exemplo de ' . $category->name),
                'category_id' => $category->id
            ]);
        }
    }
}
