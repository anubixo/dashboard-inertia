<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Modules\Blog\Controllers\BlogController;
use App\Modules\City\Controllers\CityController;
use App\Modules\Admin\Controllers\AuthController;
use App\Modules\Admin\Controllers\UserController;
use App\Modules\Admin\Controllers\LanguageController;
use App\Modules\Admin\Controllers\DashboardController;
use App\Modules\Country\Controllers\CountryController;
use App\Modules\BlogCategory\Controllers\BlogCategoryController;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Dashboard web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::name('dashboard.')
    ->middleware(['set.locale'])
    ->group(function () {
        Route::get('/login', [AuthController::class, 'show'])
            ->name('login.show');

        Route::post('/login', [AuthController::class, 'login'])
            ->name('login.submit');

        Route::get('change-language/{language}', [DashboardController::class, 'changeLanguage'])
            ->name('change.lang');

        Route::middleware(['auth', 'verified'])
            ->group(function () {
                Route::get('/', [DashboardController::class, 'home'])
                    ->name('home');

                Route::get('/home', [DashboardController::class, 'homeDev'])
                    ->name('home.dev');

                Route::post('logout', [AuthController::class, 'logout'])
                    ->name('logout');

                // Profile Routes
                Route::get('/profile', [ProfileController::class, 'edit'])
                    ->name('profile.edit');
                Route::patch('/profile', [ProfileController::class, 'update'])
                    ->name('profile.update');
                Route::delete('/profile', [ProfileController::class, 'destroy'])
                    ->name('profile.destroy');

                // User Routes
                // Route::resource('user', UserController::class);

                // Country Routes
                // Route::resource('country', CountryController::class)
                //     ->except(['show']);

                // Route::delete('country/delete/{id}', [CountryController::class, 'forceDelete'])
                //     ->name('country.force.delete');

                // Route::get('country/get_translation', [CountryController::class, 'getTranslation'])
                //     ->name('country.get_translation');

                // Route::post('country/translation', [CountryController::class, 'setTranslation'])
                //     ->name('country.translation');

                // City Routes
                // Route::resource('city', CityController::class)
                //     ->except(['show']);

                // Route::delete('city/delete/{id}', [CityController::class, 'forceDelete'])
                //     ->name('city.force.delete');

                // Route::get('city/get_translation', [CityController::class, 'getTranslation'])
                //     ->name('city.get_translation');

                // Route::post('city/translation', [CityController::class, 'setTranslation'])
                //     ->name('city.translation');

                // Language Routes
                // Route::resource('language', LanguageController::class)
                //     ->only(['index']);

                // BlogCategory Routes
                // Route::resource('blog-category', BlogCategoryController::class)
                //     ->except(['show']);

                // Route::delete('blog-category/delete/{id}', [BlogCategoryController::class, 'forceDelete'])
                //     ->name('blog-category.force.delete');

                // Route::get('blog-category/get_translation', [BlogCategoryController::class, 'getTranslation'])
                //     ->name('blog-category.get_translation');

                // Route::post('blog-category/translation', [BlogCategoryController::class, 'setTranslation'])
                //     ->name('blog-category.translation');

                // Blog Routes
                // Route::resource('blog', BlogController::class);

                // Route::delete('blog/delete/{id}', [BlogController::class, 'forceDelete'])
                //     ->name('blog.force.delete');

                // Route::get('blog/get_translation', [BlogController::class, 'getTranslation'])
                //     ->name('blog.get_translation');

                // Route::post('blog/translation', [BlogController::class, 'setTranslation'])
                //     ->name('blog.translation');
            });
    });
