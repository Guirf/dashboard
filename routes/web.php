<?php




use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ShowRamais;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ActionController;
use App\Http\Livewire\ClickToCall;

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


Route::get('/dashboard', [HomeController::class, 'index'])->middleware('auth')->name('dashboard');

Route::get('/clicktocall/{numeroA}/{numeroB}', [ClicktocallController::class, 'ctc']);

Route::get('/add/ramal', [ActionController::class, 'addRamal'])->name('add/ramal');
Route::post('/add/ramal/new', [ActionController::class, 'addRamalReturn'])->name('add/ramal/new');

Route::get('add/users', [ActionController::class, 'addUsers'])->name('add/users');
Route::post('/add/users/new', [ActionController::class, 'addUsersReturn'])->name('add/users/new');

Route::get('/delete/{ramal_id}', [ActionController::class, 'deleteRamal'])->name('/delete/{ramal_id}');

Route::get('asterisk', [ActionController::class, 'asterisk'])->name('asterisk');
 Route::get('fila', [ShowRamais::class, 'fila'])->name('fila');
//Route::get('fila/login', [ShowRamais::class, 'logIn']);

Route::get('fila/deslogar', [ActionController::class, 'filaDeslogar'])->name('fila/deslogar');

Route::get('logs', [ActionController::class, 'logs'])->name('logs');

Route::get('ramais', ShowRamais::class)->name('ramais');
Route::get('ramais/delete/{id}', ShowRamais::class);

 Route::get('testee', [ShowRamais::class, 'teste']);
Route::get('ctc/{numeroA}/{numeroB}', ClickToCall::class);

Route::get('dashboard', [ShowRamais::class, 'dashboard'])->middleware('auth')->name('dashboard');
require __DIR__.'/auth.php';
