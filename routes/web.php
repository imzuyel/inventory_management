<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CustommerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CostController;
use App\Http\Controllers\AtendenceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\OrderController;
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



Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');



// Employee Controller

Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.index');
Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
Route::post('/employee/create', [EmployeeController::class, 'store'])->name('employee.store');
Route::get('/employee/{id}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
Route::post('/employee/update', [EmployeeController::class, 'update'])->name('employee.update');
Route::get('/employee/{id}/destroy', [EmployeeController::class, 'destroy'])->name('employee.destroy');



// Custommer Controller
Route::get('/custommer', [CustommerController::class, 'index'])->name('custommer.index');
Route::get('/custommer/create', [CustommerController::class, 'create'])->name('custommer.create');
Route::get('/custommer/{id}/edit', [CustommerController::class, 'edit'])->name('custommer.edit');
Route::post('/custommer/update', [CustommerController::class, 'update'])->name('custommer.update');
Route::get('/custommer/{id}/destroy', [CustommerController::class, 'destroy'])->name('custommer.destroy');
// Modal Customer
Route::post('/custommer/create/modal', [CustommerController::class, 'store_modal'])->name('custommer.store_modal');


// Supplier Controller
Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');
Route::get('/supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
Route::post('/supplier/create', [SupplierController::class, 'store'])->name('supplier.store');
Route::get('/supplier/{id}/edit', [SupplierController::class, 'edit'])->name('supplier.edit');
Route::post('/supplier/update', [SupplierController::class, 'update'])->name('supplier.update');
Route::get('/supplier/{id}/destroy', [SupplierController::class, 'destroy'])->name('supplier.destroy');



// Supplier Controller

Route::get('/salary', [SalaryController::class, 'index'])->name('salary.index');
Route::get('/salary/create', [SalaryController::class, 'create'])->name('salary.create');
Route::post('/salary/create', [SalaryController::class, 'store'])->name('salary.store');
Route::get('/salary/{id}/edit', [SalaryController::class, 'edit'])->name('salary.edit');
Route::post('/salary/update', [SalaryController::class, 'update'])->name('salary.update');
Route::get('/salary/{id}/destroy', [SalaryController::class, 'destroy'])->name('salary.destroy');

// Advance Salary
Route::get('/salary/advance', [SalaryController::class, 'index_advance'])->name('salary.index_advance');
Route::get('/salary/create/advance', [SalaryController::class, 'create_advance'])->name('salary.create_advance');
Route::post('/salary/create/advance/update', [SalaryController::class, 'store_advance'])->name('salary.store_advance');


// Category
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category/create', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/update', [CategoryController::class, 'update'])->name('category.update');
Route::get('/category/{id}/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');
Route::get('/category/{id}/unpublished', [CategoryController::class, 'unpublished'])->name('category.unpublished');
Route::get('/category/{id}/published', [CategoryController::class, 'published'])->name('category.published');


// Brand
Route::get('/brand', [BrandController::class, 'index'])->name('brand.index');
Route::get('/brand/create', [BrandController::class, 'create'])->name('brand.create');
Route::post('/brand/create', [BrandController::class, 'store'])->name('brand.store');
Route::get('/brand/{id}/edit', [BrandController::class, 'edit'])->name('brand.edit');
Route::post('/brand/update', [BrandController::class, 'update'])->name('brand.update');
Route::get('/brand/{id}/destroy', [BrandController::class, 'destroy'])->name('brand.destroy');
Route::get('/brand/{id}/unpublished', [BrandController::class, 'unpublished'])->name('brand.unpublished');
Route::get('/brand/{id}/published', [BrandController::class, 'published'])->name('brand.published');


// Product
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product/create', [ProductController::class, 'store'])->name('product.store');
Route::post('/product/create/advance/update', [ProductController::class, 'store_advance'])->name('product.store_advance');
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/product/update', [ProductController::class, 'update'])->name('product.update');
Route::get('/product/{id}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');
Route::get('/product/{id}/unpublished', [ProductController::class, 'unpublished'])->name('product.unpublished');
Route::get('/product/{id}/published', [ProductController::class, 'published'])->name('product.published');


// Cost
Route::get('/cost', [CostController::class, 'index'])->name('cost.index');
Route::get('/cost/create', [CostController::class, 'create'])->name('cost.create');
Route::post('/cost/create', [CostController::class, 'store'])->name('cost.store');
Route::get('/cost/{id}/edit', [CostController::class, 'edit'])->name('cost.edit');
Route::post('/cost/update', [CostController::class, 'update'])->name('cost.update');
Route::get('/cost/{id}/destroy', [CostController::class, 'destroy'])->name('cost.destroy');
// Month
Route::get('/cost/today', [CostController::class, 'today'])->name('cost.today');
Route::get('/cost/this_month', [CostController::class, 'this_month'])->name('cost.this_month');
Route::get('/cost/this_year', [CostController::class, 'this_year'])->name('cost.this_year');
Route::get('/cost/january', [CostController::class, 'january'])->name('cost.january');
Route::get('/cost/february', [CostController::class, 'february'])->name('cost.february');
Route::get('/cost/march', [CostController::class, 'march'])->name('cost.march');
Route::get('/cost/april', [CostController::class, 'april'])->name('cost.april');
Route::get('/cost/may', [CostController::class, 'may'])->name('cost.may');
Route::get('/cost/june', [CostController::class, 'june'])->name('cost.june');
Route::get('/cost/july', [CostController::class, 'july'])->name('cost.july');
Route::get('/cost/auguest', [CostController::class, 'auguest'])->name('cost.auguest');
Route::get('/cost/september', [CostController::class, 'september'])->name('cost.september');
Route::get('/cost/october', [CostController::class, 'october'])->name('cost.october');
Route::get('/cost/november', [CostController::class, 'november'])->name('cost.november');
Route::get('/cost/december', [CostController::class, 'december'])->name('cost.december');


// Category
Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
Route::get('/setting/{id}/edit', [SettingController::class, 'edit'])->name('setting.edit');
Route::post('/setting/update', [SettingController::class, 'update'])->name('setting.update');


// Pos
Route::get('/pos', [PosController::class, 'index'])->name('pos.index');
Route::post('/pos/add/cart', [PosController::class, 'add_cart'])->name('pos.add_cart');
Route::post('/pos/update/cart/', [PosController::class, 'update_cart'])->name('pos.update_cart');
Route::get('/pos/delete/cart/{rowId}', [PosController::class, 'delete_cart'])->name('pos.delete_cart');
Route::post('/pos/create/invoice', [PosController::class, 'create_invoice'])->name('pos.create_invoice');
Route::get('/pos/confirm/invoice', [PosController::class, 'confirm'])->name('pos.confirm');


// Order
Route::get('/order', [OrderController::class, 'index'])->name('order.index');
Route::get('/order/store/', [OrderController::class, 'store'])->name('order.store');
Route::get('/order/pendding/', [OrderController::class, 'pendding'])->name('order.pendding');
Route::get('/order/views/{id}', [OrderController::class, 'views'])->name('order.views');
Route::get('/order/done/{id}', [OrderController::class, 'done'])->name('order.done');




