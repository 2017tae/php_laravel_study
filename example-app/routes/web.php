<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/articles/create', function () {
    return view('articles/create');
});

Route::post('/articles', function (Request $request) {
    // 비어있지 않고, 문자열이고, 255자를 넘으면 안된다. (유효성 검사)

    // 라라벨에서의 유효성 검사
    $request->validate([
        'body' => [
            'required',
            'string',
            'max:255'
        ],
    ]);

    // // 아래는 전통적인 유효성 검사
    // $body = $_POST['body'];

    // if (!$body) {
    //     // body에 값이 없을때 이전 화면으로 보냄
    //     return redirect()->back();
    // }

    // if (!is_string($body)) {
    //     // body 값이 string이 아니면
    //     return redirect()->back();
    // }

    // if (strlen($body) > 255) {
    //     // body 의 값이 255를 넘으면
    //     return redirect()->back();
    // }
    return 'hello';
});
