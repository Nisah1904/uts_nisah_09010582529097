<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'name' => 'Teknologi',
            'description' => 'Buku tentang teknologi dan komputer.',
        ]);

        Category::create([
            'name' => 'Novel',
            'description' => 'Buku fiksi dan novel.',
        ]);

        Category::create([
            'name' => 'Pendidikan',
            'description' => 'Buku untuk pembelajaran dan pendidikan.',
        ]);
    }
}