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






// AUTH PAGE ============================================

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





// VSTRECHA ============================================

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





// VERSIONS ============================================

Route::get('/versions', 
    [App\Http\Controllers\VersionController::class, 'index'])->name('versions.index')->middleware('auth');

// create versions
Route::get('/versions/create', 
    [App\Http\Controllers\VersionController::class, 'create'])->name('version.create')->middleware('auth');

Route::get('/versions/{version}', 
    [App\Http\Controllers\VersionController::class, 'show'])->name('version.show')->middleware('auth');

Route::get('/versions/{version}/edit', 
    [App\Http\Controllers\VersionController::class, 'edit'])->name('version.edit')->middleware('auth');

Route::patch('/versions/{version}', 
    [App\Http\Controllers\VersionController::class, 'update'])->name('version.update')->middleware('auth');

Route::post('/versions', 
    [App\Http\Controllers\VersionController::class, 'store'])->name('version.store')->middleware('auth');

Route::get('/versions/{version}', 
    [App\Http\Controllers\VersionController::class, 'destroy'])->name('version.delete')->middleware('auth');

Route::get('/version_first_or_create', 
    [App\Http\Controllers\VersionController::class, 'firstOrCreate'])->name('firstOrCreate')->middleware('auth');

Route::get('/version_update_or_create', 
    [App\Http\Controllers\VersionController::class, 'updateOrCreate'])->name('updateOrCreate')->middleware('auth');





// TEST ============================================

// Route::get('/test', 'MyTestController@showPage');

// Route::get('/test', 'TestController@testPage')->name('tests')->middleware('auth');
Route::get('/test', [App\Http\Controllers\TestController::class, 'testPage'])->name('tests')->middleware('auth');