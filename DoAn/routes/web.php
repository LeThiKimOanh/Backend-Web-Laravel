<?php

use App\Http\Controllers\Admin\HotelController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TourCategoryController;
use App\Http\Controllers\Admin\TourGuideController;
use App\Http\Controllers\Admin\TourController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Users\CommentController;
use App\Http\Controllers\Users\HotelController as UsersHotelController;
use App\Http\Controllers\Users\LoginController as UsersLoginController;
use App\Http\Controllers\Users\MainController as UsersMainController;
use App\Http\Controllers\Users\OrderController as UsersOrderController;
use App\Http\Controllers\Users\PaymentController;
use App\Http\Controllers\Users\TourController as UsersTourController;
use App\Http\Middleware\AuthAdmin;
use Symfony\Component\Mailer\Transport\Smtp\Auth\LoginAuthenticator;



Route::get('/',[UsersMainController::class,'index']);
Route::get('login',[UsersMainController::class,'loginPage']);
Route::post('login',[UsersLoginController::class,'login']);
Route::get('logout',[UsersLoginController::class,'logout']);
Route::get('registration',[UsersMainController::class,'registrationPage']);
Route::post('registration',[UsersLoginController::class,'registration']);
Route::get('tour',[UsersTourController::class,'tourList']);
Route::get('tour_detail/{tour}',[UsersTourController::class,'tourDetail']);
Route::get('search_tour',[UsersTourController::class,'searchTour']);
Route::get('search',[UsersTourController::class,'search']);
Route::get('hotel',[UsersHotelController::class,'hotelList']);
Route::get('hotel_detail/{hotel}',[UsersHotelController::class,'hotelDetail']);
Route::get('search_hotel',[UsersHotelController::class,'searchHotel']);
Route::get('about_us',[UsersMainController::class,'aboutUs']);
Route::get('contact_us',[UsersMainController::class,'contactUs']);
Route::get('user_profile',[UsersMainController::class,'userProfile']);
Route::get('tour_booked',[UsersMainController::class,'tourBooked']);
Route::get('change_password',[UsersMainController::class,'changePassword']);
Route::post('booking',[UsersOrderController::class,'booking']);
Route::get('order_cancer/{order}',[UsersOrderController::class,'orderCancer']);
Route::post('vnpay_payment/{order}',[PaymentController::class,'vnpayPayment']);
Route::get('save_profile/{user}',[UsersMainController::class,'saveProfile']);
Route::get('comment',[CommentController::class,'comment']);

Route::get('admin/login',[LoginController::class,'index']);
Route::post('admin/login',[LoginController::class,'login']);
Route::get('admin/logout',[LoginController::class,'logout']);
Route::middleware('auth.check')->prefix('admin')-> group(function() {

    Route::get('/',[MainController::class,'index']);
    Route::get('home',[MainController::class,'index']);

    Route::prefix('slider')->group(function() {
        Route::get('/',[SliderController::class,'index']);
        Route::get('add',[SliderController::class,'addPage']);
        Route::post('add',[SliderController::class,'addSlider']);
        Route::get('update/{slider}',[SliderController::class,'updatePage']);
        Route::post('update/{slider}',[SliderController::class,'updateSlider']);
        Route::DELETE('delete',[SliderController::class,'deleteSlider']);
        Route::get('controll',[SliderController::class,'controllSlider']);
        Route::post('view',[SliderController::class,'view']);
    });

    Route::prefix('tour_category')->group(function() {
        Route::get('/',[TourCategoryController::class,'index']);
        Route::get('add',[TourCategoryController::class,'addPage']);
        Route::post('add',[TourCategoryController::class,'addTourCategory']);
        Route::get('update/{tourCategory}',[TourCategoryController::class,'updatePage']);
        Route::post('update/{tourCategory}',[TourCategoryController::class,'updateTourCategory']);
        Route::DELETE('delete',[TourCategoryController::class,'deleteTourCategory']);
    });

    Route::prefix('promotion')->group(function() {
        Route::get('/',[PromotionController::class,'index']);
        Route::get('add',[PromotionController::class,'addPage']);
        Route::post('add',[PromotionController::class,'addPromotion']);
        Route::get('update/{promotion}',[PromotionController::class,'updatePage']);
        Route::post('update/{promotion}',[PromotionController::class,'updatePromotion']);
        Route::DELETE('delete',[PromotionController::class,'deletePromotion']);
        Route::post('view',[PromotionController::class,'view']);
    });

    Route::prefix('hotel')->group(function() {
        Route::get('/',[HotelController::class,'index']);
        Route::get('add',[HotelController::class,'addPage']);
        Route::post('add',[HotelController::class,'addHotel']);
        Route::get('update/{hotel}',[HotelController::class,'updatePage']);
        Route::post('update/{hotel}',[HotelController::class,'updateHotel']);
        Route::DELETE('delete',[HotelController::class,'deleteHotel']);
    });

    Route::prefix('tour_guide')->group(function() {
        Route::get('/',[TourGuideController::class,'index']);
        Route::get('add',[TourGuideController::class,'addPage']);
        Route::post('add',[TourGuideController::class,'addTourGuide']);
        Route::get('update/{tourGuide}',[TourGuideController::class,'updatePage']);
        Route::post('update/{tourGuide}',[TourGuideController::class,'updateTourGuide']);
        Route::DELETE('delete',[TourGuideController::class,'deleteTourGuide']);
    });

    Route::prefix('tour')->group(function() {
        Route::get('/',[TourController::class,'index']);
        Route::get('add',[TourController::class,'addPage']);
        Route::post('add',[TourController::class,'addTour']);
        Route::get('update/{tour}',[TourController::class,'updatePage']);
        Route::post('update/{tour}',[TourController::class,'updateTour']);
        Route::DELETE('delete',[TourController::class,'deleteTour']);
        Route::get('view/{tour}',[TourController::class,'showTour']);
    });

    Route::prefix('order')->group(function() {
        Route::get('/',[OrderController::class,'index']);
        Route::post('changeAction',[OrderController::class,'changeAction']);
        Route::get('booked',[OrderController::class,'booked']);
        Route::get('wating_confimation',[OrderController::class,'watingConfimation']);
    });

    Route::prefix('statistics')->group(function() {
        Route::get('/',[MainController::class,'statistics']);
        Route::post('/',[MainController::class,'statistics']);
    });

    Route::prefix('user')->group(function() {
        Route::get('profile/{user}',[UserController::class,'getProfile']);
    });

    Route::prefix('comment')->group(function() {
        Route::get('/',[MainController::class,'comment']);
        Route::delete('delete',[MainController::class,'deleteComment']);
    });


});





