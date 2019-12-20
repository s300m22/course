<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


/**
 * User
 */
Route::resource('usres', 'User\UserController', ['except' => ['create', 'edit']]);


/**
 * Buyers
 */
Route::resource('buyers', 'Buyer\BuyerController',['only' => ['index', 'show']]);
Route::resource('buyers.transaction', 'Buyer\BuyerTransactionController',['only' => ['index']]);
Route::resource('buyers.categoories', 'Buyer\BuyerCategoiresController',['only' => ['index']]);
Route::resource('buyers.product', 'Buyer\BuyerProductController',['only' => ['index']]);


/**
 * Categories
 */
Route::resource('categories', 'Category\CategoryController', ['except' => ['create', 'edit']]);
Route::resource('categories.product', 'Category\CategoryProduct', ['only' => ['index']]);
Route::resource('categories.seller', 'Category\CategorySellerController', ['only' => ['index']]);
Route::resource('categories.buyer', 'Category\CategoryBuyerController', ['only' => ['index']]);


/**
 * Products
 */
Route::resource('products', 'Product\ProductController', ['only' => ['index', 'show']]);
Route::resource('products.transaction', 'Product\ProductTransactionController', ['only' => ['index']]);
Route::resource('products.buyer', 'Product\ProductBuyerController', ['only' => ['index']]);
Route::resource('products.categories', 'Product\ProductCategoryController', ['only' => ['index' , 'update' , 'destroy']]);


/**
 * Sellers
 */
Route::resource('sellers', 'Seller\SellerController', ['only' => ['index', 'show']]);
Route::resource('sellers.transactions', 'Seller\SellerTransactionController', ['only' => ['index', 'show']]);

Route::resource('sellers.categories', 'Seller\SellerCategoryController', ['only' => ['index', 'show']]);

Route::resource('sellers.products', 'Seller\SellerProductController', ['except' => ['create', 'edit' , 'show']]);

/**
 * Transactions
 */
Route::resource('transactions', 'Transaction\TransactionController', ['only' => ['index', 'show']]);

Route::resource('transactions.categories', 'Transaction\TransactionCatrgoryController', ['only' => ['index']]);
Route::resource('transactions.seller', 'Transaction\TransactionSellerController', ['only' => ['index']]);



Route::name('verify')->get('users/verify/{token}' , 'User\UserController@verify');
Route::name('resend')->get('users/{user}/resend' , 'User\UserController@resend');



Route::post('oauth/token', '\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');
Route::name('me')->get('users/me', 'User\UserController@me');
