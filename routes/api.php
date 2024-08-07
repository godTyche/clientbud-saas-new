<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\SuperAdmin\Package;
use App\Models\Module;
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

ApiRoute::group(['namespace' => 'App\Http\Controllers'], function () {
    ApiRoute::get('purchased-module', ['as' => 'api.purchasedModule', 'uses' => 'HomeController@installedModule']);
});

Route::get('/get_packages', function(){
    $packages = Package::where('default','no')->get();
    $modules = Module::select('module_name','module_description')->get();
    foreach($modules as $module) {
        $module_desc[$module->module_name] = $module->module_description;
    }
    $data['packages'] = $packages;
    $data['modules'] = $module_desc;
    return $data;
});