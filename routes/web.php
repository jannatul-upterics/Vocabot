<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Vocabot Web Routes (Clean URLs without .html)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('pages.index');
});

Route::permanentRedirect('/vocabot', '/');

Route::get('/product', function () {
    return view('pages.product');
});

Route::get('/how-it-works', function () {
    return view('pages.how-it-works');
});

Route::get('/solutions', function () {
    return view('pages.solutions');
});

Route::permanentRedirect('/sectors', '/solutions');

Route::get('/integrations', function () {
    return view('pages.integrations');
});

use App\Http\Controllers\ContactController;

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/policy', function () {
    return view('pages.policy');
});

Route::permanentRedirect('/policies', '/policy');

/*
|--------------------------------------------------------------------------
| Media & Storage Asset Route
| Serves files stored via CodeBaseHub media manager or Vocabot storage
|--------------------------------------------------------------------------
*/
Route::get('/storage/{path}', function (string $path) {
    if (str_contains($path, '..')) {
        abort(400);
    }

    $candidates = [
        public_path('storage/'.$path),
        base_path('../storage/app/public/'.$path),
        base_path('../public/storage/'.$path),
    ];

    foreach ($candidates as $cand) {
        if (file_exists($cand) && is_file($cand)) {
            return response()->file($cand);
        }
    }

    abort(404);
})->where('path', '.*');
