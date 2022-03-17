<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SecretController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;

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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function ()
{
    Route::view('/dashboard', 'dash')->name('dash');

    /* -------------------------------  Routes for Users  ------------------------------- */
    Route::get('/add_user',[UserController::class, 'create'])->name('users.create');

    Route::post('api/fetch-states', [UserController::class, 'fetchState']);

    Route::post('api/fetch-cities', [UserController::class, 'fetchCity']);

    Route::post('/store_user', [UserController::class, 'store'])->name('users.store');

    Route::get('/manage_user', [UserController::class, 'index'])->name('users.index');

    Route::get('/edit_user/{id}', [UserController::class, 'edit'])->name('users.edit');

    Route::post('/update_user/{id}', [UserController::class, 'update'])->name('users.update');

    Route::get('/delete_user/{id}', [UserController::class, 'delete'])->name('users.delete');

    Route::get('/export_excel_user', [UserController::class, 'export_excel'])->name('users.export_excel');

    Route::get('/export_csv_user', [UserController::class, 'export_csv'])->name('users.export_csv');

    Route::post('/import_user', [UserController::class, 'import_users'])->name('users.import');

    /* ------------------------------  Routes for Products  ------------------------------ */
    Route::get('/add_product', [ProductController::class, 'create'])->name('products.create');

    Route::post('/store_product', [ProductController::class, 'store'])->name('products.store');

    Route::get('/manage_product', [ProductController::class, 'index'])->name('products.index');

    Route::get('/edit_product/{id}', [ProductController::class, 'edit'])->name('products.edit');

    Route::post('/update_product/{id}', [ProductController::class, 'update'])->name('products.update');

    Route::get('/delete_product/{id}', [ProductController::class, 'delete'])->name('products.delete');

    Route::get('/export_excel_product', [ProductController::class, 'export_excel'])->name('products.export_excel');

    Route::get('/export_csv_product', [ProductController::class, 'export_csv'])->name('products.export_csv');

    Route::post('/import_product', [ProductController::class, 'import_products'])->name('products.import');

    /* -------------------------------  Routes for Roles  ------------------------------- */
    Route::get('/add_role', [RoleController::class, 'create'])->name('roles.create');

    Route::post('/store_role', [RoleController::class, 'store'])->name('roles.store');

    Route::get('/manage_role', [RoleController::class, 'index'])->name('roles.index');

    Route::get('/edit_role/{id}', [RoleController::class, 'edit'])->name('roles.edit');

    Route::post('/update_role/{id}', [RoleController::class, 'update'])->name('roles.update');

    Route::get('/delete_role/{id}', [RoleController::class, 'delete'])->name('roles.delete');

    Route::get('/export_excel_role', [RoleController::class, 'export_excel'])->name('roles.export_excel');

    Route::get('/export_csv_role', [RoleController::class, 'export_csv'])->name('roles.export_csv');

    Route::post('/import_role', [RoleController::class, 'import_roles'])->name('roles.import');

    /* ------------------------------  Routes for Secrets  ------------------------------- */
    Route::get('/manage_secret', [SecretController::class, 'index'])->name('secrets.index');

    Route::get('/edit_secret/{id}', [SecretController::class, 'edit'])->name('secrets.edit');

    Route::post('/update_secret/{id}', [SecretController::class, 'update'])->name('secrets.update');

    Route::get('/delete_secret/{id}', [SecretController::class, 'delete'])->name('secrets.delete');

    Route::get('/export_excel_secret', [SecretController::class, 'export_excel'])->name('secrets.export_excel');

    Route::get('/export_csv_secret', [SecretController::class, 'export_csv'])->name('secrets.export_csv');

    Route::post('/import_secret', [SecretController::class, 'import_secrets'])->name('secrets.import');

    /* -------------------------------  Routes for Orders  ------------------------------- */
    Route::get('/manage_order', [OrderController::class, 'index'])->name('orders.index');

    Route::get('/edit_order/{id}', [OrderController::class, 'edit'])->name('orders.edit');

    Route::post('/update_order/{id}', [OrderController::class, 'update'])->name('orders.update');

    Route::get('/delete_order/{id}', [OrderController::class, 'delete'])->name('orders.delete');

    Route::get('/export_excel_order', [OrderController::class, 'export_excel'])->name('orders.export_excel');

    Route::get('/export_csv_order', [OrderController::class, 'export_csv'])->name('orders.export_csv');

    Route::post('/import_order', [OrderController::class, 'import_orders'])->name('orders.import');

    /* ----------------------------  Routes for Transactions  ---------------------------- */
    Route::get('/manage_transaction', [TransactionController::class, 'index'])->name('transactions.index');

    Route::get('/edit_transaction/{id}', [TransactionController::class, 'edit'])->name('transactions.edit');

    Route::post('/update_transaction/{id}', [TransactionController::class, 'update'])->name('transactions.update');

    Route::get('/delete_transaction/{id}', [TransactionController::class, 'delete'])->name('transactions.delete');

    Route::get('/export_excel_transaction', [TransactionController::class, 'export_excel'])->name('transactions.export_excel');

    Route::get('/export_csv_transaction', [TransactionController::class, 'export_csv'])->name('transactions.export_csv');

    Route::post('/import_transaction', [TransactionController::class, 'import_transactions'])->name('transactions.import');
});

// Route for RegisteredUserController's Country-State-City Dropdown
Route::post('api/fetch-states', [RegisteredUserController::class, 'fetchState']);
Route::post('api/fetch-cities', [RegisteredUserController::class, 'fetchCity']);
