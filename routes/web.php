<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\TourController;
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


Route::group(['prefix'=>'admin'],function(){
    Route::get('/',[AdminController::class, 'index'])->name('admin.index');
    // Route::get('/login',[AdminController::class ,'login'])->name('admin.login');
    // Route::post('/login',[AdminController::class ,'check_login'])->name('admin.check-login');
    // Route::get('/register',[AdminController::class ,'register'])->name('admin.register');
    // Route::post('/register',[AdminController::class ,'check_register'])->name('admin.check-register');
    // Route::get('/logout',[AdminController::class ,'logout'])->name('admin.logout');

    // Route::group(['prefix' => 'admin'],function(){
    //     Route::get('/',[AdminController::class ,'admin'])->name('admin');
    //     Route::get('/create.html',[AdminController::class ,'create_admin'])->name('create-acc');
    //     Route::post('/store.html',[AdminController::class ,'store_admin'])->name('store-acc');
    //     Route::get('edit/{acc}',[AdminController::class ,'edit_admin'])->name('edit-acc');
    //     Route::put('update/{acc}',[AdminController::class ,'update_admin'])->name('update-acc');
    //     Route::delete('delete/{acc}',[AdminController::class, 'delete_admin'])->name('delete_acc');
    // });
    /***************************************** Category **************************************/
    Route::group(['prefix'=>'category'],function(){
        Route::get('/',[CategoryController::class,'index'])->name('category.index');
        Route::get('/create',[CategoryController::class,'create'])->name('category.create');
        Route::post('/store',[CategoryController::class,'store'])->name('category.store');
        Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
        Route::put('/update/{id}',[CategoryController::class,'update'])->name('category.update');
        Route::delete('/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');
        Route::get('/trashed',[CategoryController::class,'trashed'])->name('category.trashed');
        Route::get('/restore/{id}',[CategoryController::class,'restore'])->name('category.restore');
        Route::get('/force-delete/{id}',[CategoryController::class,'forceDelete'])->name('category.forceDelete');
        Route::delete('delete-all',[CategoryController::class,'deleteAll'])->name('category.deleteAll');
        Route::post('restore-all',[CategoryController::class,'restoreAll'])->name('category.restoreAll');
        Route::post('forcedelete-all',[CategoryController::class,'forcedeleteAll'])->name('category.forcedeleteAll');
    });
    Route::group(['prefix'=>'destination'],function(){
        Route::get('/',[DestinationController::class,'index'])->name('destination.index');
        Route::get('/create',[DestinationController::class,'create'])->name('destination.create');
        Route::post('/store',[DestinationController::class,'store'])->name('destination.store');
        Route::get('/edit/{id}',[DestinationController::class,'edit'])->name('destination.edit');
        Route::put('/update/{id}',[DestinationController::class,'update'])->name('destination.update');
        Route::delete('/delete/{id}',[DestinationController::class,'delete'])->name('destination.delete');
        Route::get('/trashed',[DestinationController::class,'trashed'])->name('destination.trashed');
        Route::get('/restore/{id}',[DestinationController::class,'restore'])->name('destination.restore');
        Route::get('/force-delete/{id}',[DestinationController::class,'forceDelete'])->name('destination.forceDelete');
        Route::delete('delete-all',[DestinationController::class,'deleteAll'])->name('destination.deleteAll');
        Route::post('restore-all',[DestinationController::class,'restoreAll'])->name('destination.restoreAll');
        Route::post('forcedelete-all',[DestinationController::class,'forcedeleteAll'])->name('destination.forcedeleteAll');
    });
    Route::group(['prefix'=>'hotel'],function(){
        Route::get('/',[HotelController::class,'index'])->name('hotel.index');
        Route::get('/create',[HotelController::class,'create'])->name('hotel.create');
        Route::post('/store',[HotelController::class,'store'])->name('hotel.store');
        Route::get('/edit/{id}',[HotelController::class,'edit'])->name('hotel.edit');
        Route::put('/update/{id}',[HotelController::class,'update'])->name('hotel.update');
        Route::delete('/delete/{id}',[HotelController::class,'delete'])->name('hotel.delete');
        Route::get('/trashed',[HotelController::class,'trashed'])->name('hotel.trashed');
        Route::get('/restore/{id}',[HotelController::class,'restore'])->name('hotel.restore');
        Route::get('/force-delete/{id}',[HotelController::class,'forceDelete'])->name('hotel.forceDelete');
        Route::delete('delete-all',[HotelController::class,'deleteAll'])->name('hotel.deleteAll');
        Route::post('restore-all',[HotelController::class,'restoreAll'])->name('hotel.restoreAll');
        Route::post('forcedelete-all',[HotelController::class,'forcedeleteAll'])->name('hotel.forcedeleteAll');
    });
    Route::group(['prefix'=>'tour'],function(){
        Route::get('/',[TourController::class,'index'])->name('tour.index');
        Route::get('/create',[TourController::class,'create'])->name('tour.create');
        Route::post('/store',[TourController::class,'store'])->name('tour.store');
        Route::get('/edit/{id}',[TourController::class,'edit'])->name('tour.edit');
        Route::put('/update/{id}',[TourController::class,'update'])->name('tour.update');
        Route::delete('/delete/{id}',[TourController::class,'delete'])->name('tour.delete');
        Route::get('/trashed',[TourController::class,'trashed'])->name('tour.trashed');
        Route::get('/restore/{id}',[TourController::class,'restore'])->name('tour.restore');
        Route::get('/force-delete/{id}',[TourController::class,'forceDelete'])->name('tour.forceDelete');
        Route::delete('delete-all',[TourController::class,'deleteAll'])->name('tour.deleteAll');
        Route::post('restore-all',[TourController::class,'restoreAll'])->name('tour.restoreAll');
        Route::post('forcedelete-all',[TourController::class,'forcedeleteAll'])->name('tour.forcedeleteAll');
        Route::get('/getHotel',[TourController::class,'getHotel'])->name('tour.getHotel');
    });
    // Route::group(['prefix' => 'services'], function(){
    //     Route::get('/',[ServicesController::class, 'index'])->name('services.index');
    //     Route::get('create.html',[ServicesController::class, 'create'])->name('services.create');
    //     Route::post('store',[ServicesController::class, 'store'])->name('services.store');
    //     Route::get('edit/{id}',[ServicesController::class, 'edit'])->name('services.edit');
    //     Route::put('update/{id}',[ServicesController::class, 'update'])->name('services.update');
    //     Route::delete('delete/{id}',[ServicesController::class, 'delete'])->name('services.delete');
    // });

    Route::group(['prefix' => 'blogs'], function(){
        Route::get('/',[BlogsController::class, 'index'])->name('blogs.index');
        Route::get('edit/{acc}',[BlogsController::class, 'editAdmin'])->name('blogs.editAdmin');
        Route::put('update/{acc}',[BlogsController::class, 'updateAdmin'])->name('blogs.updateAdmin');
    });

    // Route::group(['prefix' => 'FAQs'], function(){
    //     Route::get('/',[FAQsController::class, 'index'])->name('FAQs.index');
    //     Route::get('create.html',[FAQsController::class, 'create'])->name('FAQs.create');
    //     Route::post('store',[FAQsController::class, 'store'])->name('FAQs.store');
    //     Route::get('edit/{id}',[FAQsController::class, 'edit'])->name('FAQs.edit');
    //     Route::put('update/{id}',[FAQsController::class, 'update'])->name('FAQs.update');
    //     Route::delete('delete/{id}',[FAQsController::class, 'delete'])->name('FAQs.delete');
    // });

    // Route::group(['prefix' => 'CategoryFAQs'], function(){
    //     Route::get('/',[CategoryFAQsController::class, 'index'])->name('CategoryFAQs.index');
    //     Route::get('create.html',[CategoryFAQsController::class, 'create'])->name('CategoryFAQs.create');
    //     Route::post('store',[CategoryFAQsController::class, 'store'])->name('CategoryFAQs.store');
    //     Route::get('edit/{id}',[CategoryFAQsController::class, 'edit'])->name('CategoryFAQs.edit');
    //     Route::put('update/{id}',[CategoryFAQsController::class, 'update'])->name('CategoryFAQs.update');
    //     Route::delete('delete/{id}',[CategoryFAQsController::class, 'delete'])->name('CategoryFAQs.delete');
    // });

});

// Route::get('FAQs.html',[FAQsController::class, 'view'])->name('FAQs.view');
// Route::get('services.html',[ServicesController::class, 'view'])->name('services.view');
// Route::get('blogs.html',[BlogsController::class, 'view'])->name('blogs.view');
// Route::get('blogs-singer/{data}',[BlogsController::class ,'singer'])->name('blogs.singer');
// Route::group(['prefix' => 'blogs','middleware'=>'user'], function(){
//     Route::get('create.html',[BlogsController::class, 'create'])->name('blogs.create');
//     Route::post('store',[BlogsController::class, 'store'])->name('blogs.store');
// });

// /*****************************************Login - Register **************************************/
// Route::get('/home.html',[HomeController::class , 'home'])->name('home');
// Route::get('/tour-pagkages.html',[HomeController::class , 'tourpagkages'])->name('home.tourpagkages');
// Route::get('/login.html',[HomeController::class , 'login_user'])->name('home-login');
// Route::post('/login.html',[HomeController::class , 'check_login_user'])->name('home-check-login');
// Route::get('/register.html',[HomeController::class , 'register_user'])->name('home-register');
// Route::post('/register.html',[HomeController::class , 'add_register_user'])->name('home-add-register');
// Route::get('/logout.html',[HomeController::class , 'logout_user'])->name('home-logout');
// Route::get('/view-forgot',[HomeController::class , 'view_forgot'])->name('home-forgot');
// Route::post('/forgot-password',[HomeController::class , 'post_forgot'])->name('post-forgot');
// Route::get('/update-user/{user}',[HomeController::class , 'update_user'])->name('update-user');
// Route::put('/postupdate-user/{user}',[HomeController::class , 'post_update_user'])->name('postupdate-user');
