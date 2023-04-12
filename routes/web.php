<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Inventory\exitingdata\ComponentController;
use App\Http\Controllers\Inventory\exitingdata\GroupController as ExitingdataGroupController;
use App\Http\Controllers\Inventory\exitingdata\IndexController;
use App\Http\Controllers\Inventory\exitingdata\MainGroupController as ExitingdataMainGroupController;
use App\Http\Controllers\Inventory\exitingdata\PartController;
use App\Http\Controllers\Inventory\exitingdata\SubGroupController as ExitingdataSubGroupController;
use App\Http\Controllers\Inventory\exitingdata\UnitController;
use App\Http\Controllers\Inventory\GroupController;
use App\Http\Controllers\Inventory\MainGroupController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\crew\CrewController;
use App\Http\Controllers\Inventory\stock\NewStockController;
use App\Http\Controllers\Inventory\transactionin\TransactionInController;
use App\Http\Controllers\Pms\TemplateApprovalController;
use App\Http\Controllers\ship\ShipController;
use App\Models\inventory\InventoryGroups;
use PhpParser\Node\Expr\New_;

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

// Route::get('/', function () {
//     return view('auth.login');
// });

Auth::routes();

Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index']);
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('ship', ShipController::class);
    Route::resource('crew', CrewController::class);
    Route::resource('profile', ProfileController::class);
    Route::resource('exitingdata', IndexController::class);
    Route::resource('newstock', NewStockController::class);
    Route::get('/data/{id}/edit', [NewStockController::class, 'edit']);
    Route::put('/data/update', [NewStockController::class, 'update'])->name('data.update');
    Route::resource('transactionin', TransactionInController::class);
});

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::resource('maingroup', ExitingdataMainGroupController::class);

    Route::resource('group', ExitingdataGroupController::class);
    Route::get('/group/{id}/edit', [ExitingdataGroupController::class, 'edit']);
    Route::put('/group/{id}', [ExitingdataGroupController::class, 'update'])->name('group.update');

    Route::resource('subgroup', ExitingdataSubGroupController::class);
    Route::get('/subgroup/{id}/edit', [ExitingdataGroupController::class, 'edit']);
    Route::put('/subgroup/{id}', [ExitingdataGroupController::class, 'update'])->name('subgroup.update');
    
    Route::resource('unit', UnitController::class);
    Route::get('/unit/{id}/edit', [ExitingdataGroupController::class, 'edit']);
    Route::put('/unit/{id}', [ExitingdataGroupController::class, 'update'])->name('unit.update');

    Route::resource('component', ComponentController::class);
    Route::get('/component/{id}/edit', [ExitingdataGroupController::class, 'edit']);
    Route::put('/component/{id}', [ExitingdataGroupController::class, 'update'])->name('component.update');

    Route::resource('part', PartController::class);
    Route::get('/part/{id}/edit', [ExitingdataGroupController::class, 'edit']);
    Route::put('/part/{id}', [ExitingdataGroupController::class, 'update'])->name('part.update');
});


Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/ship/{uuid}/selected', function ($uuid) {
        // return session()->has('ship_uuid');
        session()->put('ship_uuid', $uuid);
        // dd(session());
        return redirect('/');
    });
    Route::get('/change/ship', function () {
        session()->forget('ship_uuid');
        // dd(session());
        return redirect('/');
    });
});

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::resource('approvaltemplate', TemplateApprovalController::class);
});
