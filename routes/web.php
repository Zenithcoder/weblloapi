<?php

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});


$app->post('/login','AuthController@login');
$app->get('/logout','AuthController@logout');
$app->post('/register','AuthController@register');


$app->get('/boards','BoardController@index');
$app->post('/boards','BoardController@store');
$app->get('/boards/{board}','BoardController@show');
$app->put('/boards/{boards}','BoardController@update');
$app->delete('/boards/{boards}','BoardController@destroy');


$app->get('/boards/{board}/list','ListController@index');
$app->post('/boards/{board}/list','ListController@store');
$app->get('/boards/{board}/list/{list}','ListController@show');
$app->put('/boards/{board}/list/{list}','ListController@update');
$app->delete('/boards/{board}/list/{list}','ListController@destroy');


$app->get('/boards/{board}/list/{list}/card','CardController@index');
$app->post('/boards/{board}/list/{list}/card','CardController@store');
$app->get('card/{card}','CardController@show');
$app->put('card/{card}','CardController@update');
$app->delete('card/{card}','CardController@destroy');
$app->patch('card/update-all','CardController@updateAll');



$app->get('/users/{token}', function($token){
	$user = User::where('api_token',$token)->first();
	return response(['user'=>$user]);
});
