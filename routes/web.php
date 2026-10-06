<?php

use App\Http\Controllers\BookController;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    $totalBooks = Book::count();
    $totalCategories = Category::count();
    $totalStock = Book::sum('stock');

    $latestBooks = Book::with('category')
        ->latest()
        ->take(5)
        ->get();

    return view('dashboard', compact(
        'totalBooks',
        'totalCategories',
        'totalStock',
        'latestBooks'
    ));
})->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('books', BookController::class);
});

require __DIR__ . '/auth.php';