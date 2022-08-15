<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FallbackController;
use App\Http\Controllers\IncomingProductController;
use App\Http\Controllers\StoreProductController;

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

// Show Login Form
Route::get('/', [UserController::class, 'showLogin'])->name('login')->middleware('guest');

// Log In User
Route::post('/user/authenticate', [UserController::class, 'authenticate']);

// Show Forgot Password
Route::get('/forgot-password', [UserController::class, 'showForgotPassword'])->middleware('guest');

// Forgot Password
Route::post('/user/forgot-password', [UserController::class, 'forgotPassword']);

// Show Reset Password
Route::get('/reset-password/{token}', [UserController::class, 'showResetPassword'])->middleware('guest');

// Reset Password
Route::post('/reset-password', [UserController::class, 'resetPassword']);

// Routes Without Parameter
// Show Create Password
Route::get('/create-password/{token}', [UserController::class, 'showCreatePassword'])->middleware('guest');

// Create Password
Route::post('/create-password', [UserController::class, 'createPassword']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Profile
Route::get('/profile', [UserController::class, 'showProfile'])->middleware('auth');

// Show Edit Profile
Route::get('/edit-profile', [UserController::class, 'showEditProfile'])->middleware('auth');

// Update Profile
Route::put('/user/edit-profile', [UserController::class, 'updateProfile'])->middleware('auth');

// Show Users List
Route::get('/user/lists', [UserController::class, 'showUsersList'])->middleware('auth');

// Show Add User
Route::get('/add-user', [UserController::class, 'showAddUser'])->middleware('auth');

// Create New User
Route::post('/user/create', [UserController::class, 'createUser']);

// Show Product Registration
Route::get('/product/lists', [ProductController::class, 'showProductsList'])->middleware('auth');

// Show Add Product
Route::get('/add-product', [ProductController::class, 'showAddProduct'])->middleware('auth');

// Add Product
Route::post('/product/create', [ProductController::class, 'createProduct'])->middleware('auth');

// Show Gallery
Route::get('/gallery', [GalleryController::class, 'showGallery'])->middleware('auth');

// Show Add Image
Route::get('/add-image', [GalleryController::class, 'showAddImage'])->middleware('auth');

// Upload Image
Route::post('/gallery/add', [GalleryController::class, 'uploadImage']);

// Search Profile
Route::get('/user/search', [UserController::class, 'searchProfile'])->middleware('auth');

// Show Warehouse Inventory
Route::get('/warehouse-inventory', [ProductController::class, 'showWarehouseInventory'])->middleware('auth');

// Show Store Inventory
Route::get('/store-inventory', [StoreProductController::class, 'showStoreInventory'])->middleware('auth');

// Show Incoming Product
Route::get('/incoming-product', [IncomingProductController::class, 'showIncomingProduct'])->middleware('auth');

// Show Order Product
Route::get('/order-product', [IncomingProductController::class, 'showOrderProduct'])->middleware('auth');

// Order product
Route::post('/incoming-product/create', [IncomingProductController::class, 'orderProduct']);

// Routes With Parameter
// Show Edit User
Route::get('/edit-user/{user}', [UserController::class, 'showEditUser'])->middleware('auth');

// Update User
Route::put('/user/update/{user}', [UserController::class, 'updateUser']);

// Delete User
Route::delete('/user/delete/{user}', [UserController::class, 'deleteUser']);

// Show Edit Product
Route::get('/edit-product/{product}', [ProductController::class, 'showEditProduct'])->middleware('auth');

// Update Product
Route::put('/product/update/{product}', [ProductController::class, 'updateProduct']);

// Delete Product
Route::delete('/product/delete/{product}', [ProductController::class, 'deleteProduct']);

// Show Edit Gallery
Route::get('/edit-gallery/{gallery}', [GalleryController::class, 'showEditGallery'])->middleware('auth');

// Update Gallery
Route::put('/gallery/update/{gallery}', [GalleryController::class, 'updateGallery']);

// Delete Gallery
Route::delete('/gallery/delete/{gallery}', [GalleryController::class, 'deleteGallery']);

// Show Error Page
Route::get('/home', [UserController::class, 'showErrorPage'])->middleware('auth');

// Fallback Route
Route::fallback(FallbackController::class);