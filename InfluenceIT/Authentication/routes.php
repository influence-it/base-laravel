<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use InfluenceIT\Authentication\Controllers\LoginController;

Route::prefix('authentication')->name('authentication')->group(function () {
    Route::post('login', LoginController::class)->name('.login');
});
