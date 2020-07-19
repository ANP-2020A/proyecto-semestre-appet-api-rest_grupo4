<?php

use App\Order;
use App\Service;
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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/


/*---------------ORDER---------------------------*/
/*
Route::get('orders', function() {
    return Order::all(); });

Route::get('orders/{id}', function($id) {
    return Order::find($id); });

Route::post('orders', function(Request $request) {
    return Order::create($request->all()); });

Route::put('orders/{id}', function(Request $request, $id) {
    $order = Order::findOrFail($id);
    $order->update($request->all());

    return $order; });

Route::delete('orders/{id}', function($id) {

    Order::find($id)->delete();

    return 204; });
*/

Route::get('orders', 'OrderController@index');
Route::get('orders/{order}', 'OrderController@show');
Route::post('orders', 'OrderController@store');
Route::put('orders/{order}', 'OrderController@update');
Route::delete('orders/{order}', 'OrderController@delete');

/*---------------SERVICE---------------------------*/
Route::get('services', function() {
    return Service::all(); });
Route::get('services/{id}', function($id) {
    return Service::find($id); });

Route::post('services', function(Request $request) {
    return Service::create($request->all()); });

Route::put('services/{id}', function(Request $request, $id) {
    $service = Service::findOrFail($id);
    $service->update($request->all());

    return $service; });

Route::delete('services/{id}', function($id) {

    Service::find($id)->delete();

    return 204; });
