<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('welcome');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [MemberController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::get('expired_memberships', [MemberController::class,'expired_memberships']);

Route::get('search_for_expired_membership', [MemberController::class,'search_for_expired_membership']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('add_member', [MemberController::class, 'add_member'])->name('add_member')
    ->middleware(['auth', 'verified']);

Route::get('show_member', [MemberController::class, 'show_member'])->name('show_member')
    ->middleware(['auth', 'verified']);

Route::post('/add_new_member', [MemberController::class, 'add_new_member'])->name('add_new_member')
    ->middleware(['auth', 'verified']);

Route::get('edit_member/{id}', [MemberController::class, 'edit_member'])->name('edit_member');

Route::post('save_member/{id}', [MemberController::class, 'save_member'])->name('save_member');

Route::get('delete_member/{id}', [MemberController::class, 'delete_member'])->name('delete_member');

Route::get('/add_membership', [MemberController::class, 'add_membership'])->name('add_membership');

Route::get('/show_membership', [MemberController::class, 'show_membership'])->name('show_membership');

Route::get('/add_bundle', [MemberController::class, 'add_bundle'])->name('add_bundle');

Route::post('/add_new_bundle', [MemberController::class, 'add_new_bundle'])->name('add_new_bundle');

Route::get('/setup', [MemberController::class, 'setup']);

Route::post('/search_for_member', [MemberController::class, 'search_for_member'])->name('search_for_member');

Route::post('/add_membership_to_member/{id}', [MemberController::class, 'add_membership_to_member'])->name('add_membership_to_member');

Route::get('/delete_bundle/{id}', [MemberController::class, 'delete_bundle'])->name('delete_bundle');

Route::get('/edit_bundle/{id}', [MemberController::class, 'edit_bundle'])->name('edit_bundle');

Route::post('/save_bundle/{id}', [MemberController::class, 'save_bundle'])->name('save_bundle');

Route::get('search_for_membership', [MemberController::class, 'search_for_membership'])->name('search_for_membership');

Route::get('delete_membership/{id}', [MemberController::class, 'delete_membership'])->name('delete_membership');

Route::get('renew_membership/{id}', [MemberController::class, 'renew_membership'])->name('renew_membership');

Route::get('edit_membership/{id}', [MemberController::class, 'edit_membership'])->name('edit_membership');

Route::post('save_membership/{id}', [MemberController::class, 'save_membership'])->name('save_membership');

Route::get('show_payement', [MemberController::class,'show_payement'])->name('show_payement');

Route::get('search_for_payement', [MemberController::class,'search_for_payement'])->name('search_for_payement');


require __DIR__ . '/auth.php';
