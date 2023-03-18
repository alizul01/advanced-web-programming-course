<?php

use App\Models\User;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/login', function() {
    Auth::login(User::factory()->create());
});
