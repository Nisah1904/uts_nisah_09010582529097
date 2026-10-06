<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::create([
            'category_id' => 1,
            'title' => 'Filosofi Teras',
            'author' => 'Henry Manampiring',
            'publisher' => 'Penerbit Buku Kompas',
            'year' => 2018,
            'stock' => 10,
        ]);

        Book::create([
            'category_id' => 1,
            'title' => 'Atomic Habits',
            'author' => 'James Clear',
            'publisher' => 'Penguin Random House',
            'year' => 2018,
            'stock' => 8,
        ]);

        Book::create([
            'category_id' => 2,
            'title' => 'Laut Bercerita',
            'author' => 'Leila S. Chudori',
            'publisher' => 'Kepustakaan Populer Gramedia',
            'year' => 2017,
            'stock' => 7,
        ]);

        Book::create([
            'category_id' => 2,
            'title' => 'Bumi',
            'author' => 'Tere Liye',
            'publisher' => 'Gramedia Pustaka Utama',
            'year' => 2014,
            'stock' => 6,
        ]);

        Book::create([
            'category_id' => 3,
            'title' => 'The Psychology of Money',
            'author' => 'Morgan Housel',
            'publisher' => 'Harriman House',
            'year' => 2020,
            'stock' => 9,
        ]);
    }
}