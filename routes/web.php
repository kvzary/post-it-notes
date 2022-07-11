<?php
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/project-notes', [NoteController::class, 'index']);

Route::get('/project-notes/{note}/edit', [NoteController::class, 'edit']);

Route::put('/project-notes/{note}', [NoteController::class, 'update']);

Route::get('project-notes/create', [NoteController::class, 'create']);

Route::post('/project-notes', [NoteController::class, 'store']);

Route::delete('/project-notes/{note}', [NoteController::class, 'destroy'])->withTrashed();

Route::get('/project-notes/archive', [NoteController::class, 'archive']);

Route::post('/project-notes/{note}/archive', [NoteController::class, 'restore'])->withTrashed();