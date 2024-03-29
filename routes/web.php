<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[HomeController::class , 'index'])->name('home');
Route::get('show',function(){
    return view('form');
});
Route::prefix('products')->group(function(){
    Route::get('/', [ProductController::class,'index'])->name('products.list');

    Route::get('/add', [ProductController::class,'addProduct'])->name('products.add');
    Route::post('/add', [ProductController::class,'handleAddProduct'])->name('handleAddProduct');
    Route::get('/edit/{id}', [ProductController::class,'editProduct'])->name('products.edit');
    Route::post('/edit/{id}', [ProductController::class,'handleEditProduct'])->name('products.handleEdit');
    Route::get('/{id}', [ProductController::class,'handleDeleteProduct'])->name('products.handleDelete');

    
});
Route::prefix('categories')->group(function(){
    Route::get('/', [CategoryController::class,'index'])->name('categories.list');

    Route::get('/add', [CategoryController::class,'addCategory'])->name('categories.add');
    Route::post('/add', [CategoryController::class,'handleAddCategory'])->name('handleAddCategory');
    Route::get('/edit/{id}', [CategoryController::class,'editCategory'])->name('categories.edit');
    Route::post('/edit/{id}', [CategoryController::class,'handleEditCategory'])->name('categories.handleEdit');
    Route::get('/{id}', [CategoryController::class,'handleDeleteCategory'])->name('categories.handleDelete');

    
});
// Route::post('/unicode',function(){
//     return 'Method post của form';
// });
// Route::put('/unicode',function(){
//     return 'Method put của form';
// });
// Route::delete('/unicode',function(){
//     return 'Method delete của form';
// });
// Route::match(['get','post'],'unicode',function(){

//     $request = new Request();
//     $method = $request->method();
//     return $method;
// });
// Route::any('unicode',function(Request $request){

//     // $request = new Request();
//     $method = $request->method();
//     return $method;
// });
// Route::redirect('show','https://google.com');

// Route::view('show','form');
// Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
// Route::get('/new', 'HomeController@getNews')->name('new');
// Route::get('/category', [HomeController::class, 'getCategories'] );

// Route::get('/',function(){
//     return view('home');
// })->name('home');

// Route::prefix('admin')->group(function(){
//     Route::get('envidi/{id}-{slug}.html',function($id,$slug){

//         $content = 'Phương thức get với tham số : ';
//         $content .= 'id = '.$id;
//         $content .= '- slug = '.$slug;
//         return $content;
//     })->name('admin.envidi');
//     Route::get('show',function(){
//         return view('form');
//     })->name('admin.show');

//     Route::get('link',function(){
//         return view('link');
//     });
//     Route::prefix('product')->middleware('checkpermisson')->group(function(){
//         Route::get('/', function(){
//             return 'Danh sách sản phẩm';
//         });
//         Route::get('/add', function(){
//             return 'Thêm sản phẩm';
//         })->name('admin.product.add');
//         Route::delete('/', function(){
//             return 'Xóa sản phẩm';
//         });
//     });
// });