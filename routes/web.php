<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Vocabot Web Routes (Clean URLs without .html)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('pages.index');
});

Route::get('/vocabot', function () {
    return view('pages.index');
});

Route::get('/product', function () {
    return view('pages.product');
});

Route::get('/how-it-works', function () {
    return view('pages.how-it-works');
});

Route::get('/solutions', function () {
    return view('pages.solutions');
});

Route::get('/sectors', function () {
    return view('pages.solutions');
});

Route::get('/integrations', function () {
    return view('pages.integrations');
});

Route::get('/contact', function () {
    return view('pages.contact');
});

Route::post('/contact', function (Request $request) {
    $data = $request->all();

    $email = trim($data['email'] ?? $data['Work Email'] ?? $data['work_email'] ?? $data['Email'] ?? '');
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return response()->json([
            'success' => false,
            'message' => 'Please enter a valid work email address.'
        ], 422);
    }

    try {
        Illuminate\Support\Facades\Mail::to('jemma.a@vocabots.com')
            ->send(new App\Mail\ContactFormMail($data));

        return response()->json([
            'success' => true,
            'message' => 'Thank you! Your message has been sent successfully.'
        ]);
    } catch (\Throwable $e) {
        Illuminate\Support\Facades\Log::error('SMTP Mail Sending Failure: ' . $e->getMessage());
        return response()->json([
            'success' => false,
            'message' => 'Failed to send message: ' . $e->getMessage()
        ], 500);
    }
});

Route::get('/policy', function () {
    return view('pages.policy');
});

Route::get('/policies', function () {
    return view('pages.policy');
});
