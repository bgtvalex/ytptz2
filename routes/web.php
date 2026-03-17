<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Models\Pol;
use App\Models\Tip_vstrechi;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
})->name('welcome');*/

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/person/all');
    }
    else return redirect('login');
})->name('welcome');

Auth::routes();

Route::get('/logout', [App\Http\Controllers\LogoutController::class, 'perform'])->name('logout');

// MAIN PAGE ============================================

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/changelog', function () {
    return view('changelog');
})->name('changelog')->middleware('auth');


// PERSONS ============================================

Route::get('/person/edit/',function () {
    return view('person_edit');
})->name('person_edit_page')->middleware('auth');

Route::get('/person/edit/{id}',
    [App\Http\Controllers\PersonController::class, 'person_edit'])->name('person_edit')->middleware('auth');

Route::post('/person/edit/{id}',
    [App\Http\Controllers\PersonController::class, 'submit_person_edit'])->name('submit_person_edit')->middleware('auth');

Route::get('/person/add', function () {
    $pols = Pol::all()->sortBy('id');
    return view('person_add', ['pols' => $pols]);
})->name('person_add')->middleware('auth');

Route::post('/person/add', 
    [App\Http\Controllers\PersonController::class, 'person_add'])->name('post_person_add')->middleware('auth');

Route::get('/person/all',
    [App\Http\Controllers\PersonController::class, 'person_all'])->name('person_all')->middleware('auth');


// VSTRECHAS ============================================

Route::get('/vstrecha_add',
    [App\Http\Controllers\VstrechaController::class, 'vstrecha_add_page'])->name('vstrecha_add')->middleware('auth');

Route::post('/vstrecha_add',
    [App\Http\Controllers\VstrechaController::class, 'post_vstrecha_add'])->name('post_vstrecha_add')->middleware('auth');

Route::get('/vstrecha_all',
    [App\Http\Controllers\VstrechaController::class, 'vstrecha_all'])->name('vstrecha_all')->middleware('auth');


// LEADERS ============================================

Route::get('/leaders', function () {
    return to_route('leaders_all');
})->middleware('auth');

Route::get('/leaders_all',
[App\Http\Controllers\LeaderController::class, 'leaders_all'])->name('leaders_all')->middleware('auth');

Route::get('/leaders_add', function () {
    return view('leaders_add');
})->name('leaders_add')->middleware('auth');

Route::get('/leaders_edit', function () {
    return view('leaders_edit');
})->name('leaders_edit')->middleware('auth');
